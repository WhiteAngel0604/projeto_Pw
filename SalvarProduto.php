<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$bancodado = "bancodados";
$usuarioBanco = "root";
$senhaBanco = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$bancodado;charset=utf8", $usuarioBanco, $senhaBanco);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}


$nome = $_POST['nome_produto'] ?? null;
$categoria = $_POST['categoria_produto'] ?? null;
$preco = isset($_POST['preco']) ? floatval($_POST['preco']) : 0;
$marca = $_POST['marca'] ?? null;
$estoque = isset($_POST['estoque']) ? intval($_POST['estoque']) : 0;
$vendedor_id = $_SESSION['usuario_id'] ?? 1; 

if ($nome && $categoria && $preco > 0 && $marca && $estoque >= 0) {
    $sql = "INSERT INTO produtos (nome, categoria, preco, marca, estoque, vendedor_id) 
            VALUES (:nome, :categoria, :preco, :marca, :estoque, :vendedor_id)";
    
    $stmt = $pdo->prepare($sql); 
    
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':estoque', $estoque);
    $stmt->bindParam(':vendedor_id', $vendedor_id);
        
    if ($stmt->execute()) {
        echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href='PaginaInicial.html';</script>";
    } else {
        echo "<script>alert('Erro técnico ao salvar no banco.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Por favor, preencha todos os campos corretamente.'); window.history.back();</script>";
} 
?>
