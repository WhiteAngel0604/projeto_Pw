<?php
$conexao = mysqli_connect("localhost", "root", "", "bancodados");

if (!$conexao) { // Corrigido $conexao
    die("Falha na conexão com o banco: " . mysqli_connect_error());
}

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$dataNascimento = $_POST['DataNascimento'];
$categorias = $_POST['categorias'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];
$confirmarSenha = $_POST['confirmarsenha'];

if ($senha != $confirmarSenha) {
    die("As senhas não coincidem!");
}

$sql = "INSERT INTO cadastrocliente (nome, cpf, data_nascimento, categoria, endereco, senha) 
        VALUES ('$nome', '$cpf', '$dataNascimento', '$categorias', '$endereco', '$senha')";

if (mysqli_query($conexao, $sql)) { // Corrigido $sql
    echo "<h2>Cliente cadastrado com sucesso!</h2>";
    echo "<a href='index.html'>Ir para a tela de Login</a>";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
