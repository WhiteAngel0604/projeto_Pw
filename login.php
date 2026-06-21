<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index (1).html");
    exit();
}

$identificar = $_POST["identificar"] ?? "";
$senha = $_POST["Senha"] ?? "";

if (empty($identificar) || empty($senha)) {
    die("Usuário ou senha inválidos.");
}

$host = "localhost";
$bancodado = "bancodados";
$usuarioBanco = "root";
$senhaBanco = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$bancodado;charset=utf8", $usuarioBanco, $senhaBanco);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 1. Procura primeiro na tabela de clientes (Por e-mail/CPF)
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE cpf = :id");
    $stmt->execute(['id' => $identificar]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        $stmt = $pdo->prepare("SELECT * FROM vendedores WHERE email = :id OR cpf = :id OR cnpj = :id");
        $stmt->execute(['id' => $identificar]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    if (!$usuario || $senha !== $usuario["senha"]) {
        die("Usuário ou senha inválidos.");
    }

    // Se tudo der certo, manda para a vitrine
    header("Location: PaginaInicial.html");
    exit();

} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
