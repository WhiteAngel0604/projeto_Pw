<?php
session_start();

header('Content-Type: text/html; charset=utf-8');

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

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo_usuario'] !== 'vendedor') 
{
    die("Acesso negado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $nome = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoria = filter_input(INPUT_POST, 'categoria_produto', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
    $marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_SPECIAL_CHARS);
    $estoque = filter_input(INPUT_POST, 'estoque', FILTER_VALIDATE_INT);
    $vendedor_id = $_SESSION['usuario_id'];


    if ($nome && $categoria && $preco > 0 && $marca && $estoque >= 0) 
    {
        
        $sql = "INSERT INTO produtos (nome, categoria, preco, marca, estoque, vendedor_id) 
                VALUES (:nome, :categoria, :preco, :marca, :estoque, :vendedor_id)";
        
        $stmt = $conexao->prepare($sql);
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':estoque', $estoque);
        $stmt->bindParam(':vendedor_id', $vendedor_id);
        
        if ($stmt->execute()) 
        {

            echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href='PaginaInicial.html';</script>";
        } 
        else 
        {
            echo "<script>alert('Erro técnico ao salvar no banco.'); window.history.back();</script>";
        }
    } 
    else 
    {
        echo "<script>alert('Por favor, preencha todos os campos corretamente.'); window.history.back();</script>";
    }
}
?>
