<?php
session_start();

header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$banco = "seu_banco_de_dados";
$usuario = "root";
$senha = "";

try 
{
    $conexao = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) 
{
    die("Falha na conexão com o banco de dados: " . $e->getMessage());
}

// Bloqueia a execução se quem tentar enviar os dados não for um vendedor logado
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo_usuario'] !== 'vendedor') {
    die("Acesso negado.");
}

// Verifica se os dados vieram pelo formulário (Método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Filtros de segurança contra injeção de scripts maliciosos (XSS)
    $nome = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoria = filter_input(INPUT_POST, 'categoria_produto', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
    $marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_SPECIAL_CHARS);
    $estoque = filter_input(INPUT_POST, 'estoque', FILTER_VALIDATE_INT);
    $vendedor_id = $_SESSION['usuario_id']; // Salva qual vendedor cadastrou esse item

    // Validação de segurança no servidor (caso o JavaScript seja desativado)
    if ($nome && $categoria && $preco > 0 && $marca && $estoque >= 0) {
        
        // Comando SQL preparado (Evita ataques de SQL Injection)
        $sql = "INSERT INTO produtos (nome, categoria, preco, marca, estoque, vendedor_id) 
                VALUES (:nome, :categoria, :preco, :marca, :estoque, :vendedor_id)";
        
        $stmt = $conexao->prepare($sql);
        
        // Conecta as variáveis de forma segura aos parâmetros do banco
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':estoque', $estoque);
        $stmt->bindParam(':vendedor_id', $vendedor_id);
        
        if ($stmt->execute()) {
            // Se salvar com sucesso, exibe o aviso e joga o vendedor de volta para a vitrine
            echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href='PaginaInicial.html';</script>";
        } else {
            echo "<script>alert('Erro técnico ao salvar no banco.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos corretamente.'); window.history.back();</script>";
    }
}
?>
