<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.html");
    exit();
}

$identificar = $_POST["identificar"] ?? "";
$senha = $_POST["Senha"] ?? "";

if (empty($identificar) || empty($senha)) {
    print "Usuário ou senha inválidos.";
    exit();
}

// conexão com o banco de dados
$host = "localhost";
$bancodado = "bancodados";
$usuarioBanco = "root";
$senhaBanco = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$bancodado;charset=utf8",
        $usuarioBanco,
        $senhaBanco
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    print("Erro na conexão: " . $e->getMessage());
    exit();
}

// desenrola o sql aqui dps

if (!$usuario || !password_verify($senha, $usuario["senha_hash"])) {
    die("Usuário ou senha inválidos.");
}


header("Location: dashboard.php");
exit();

?>
