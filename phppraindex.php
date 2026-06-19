<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.html");
    exit();
}

$identificar = ($_POST["identificar"] ?? "");
$senha = $_POST["Senha"] ?? "";

if (empty($identificar) || empty($senha)) {
     print "Usuário ou senha inválidos.";
    exit(); 
}

//bglh pro banco de dados conectar dps
$host   = "localhost";
$bancodado    = "nome_do_banco";
$usuario   = "usuario_banco";
$senha   = "senha_banco";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print("Erro na conexão: " . $e->getMessage());
  exit();
}

//desenrola o sql aqui dps

if (!$usuario || !password_verify($senha, $usuario["senha_hash"])) {
    die("Usuário ou senha inválidos.");
}

// ─── quando o Login der bom ele salva e redireciona ────────────────────────────────
$_SESSION["usuario_id"]   = $usuario["id"];
$_SESSION["usuario_nome"] = $usuario["nome"];

header("Location: dashboard.php");
exit();
?>
