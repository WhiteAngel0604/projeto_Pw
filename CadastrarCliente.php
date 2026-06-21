<?php

$conexao = mysqli_connect(
    "localhost",
    "root",
    "",
    "bancodados"
);

if (!conexao) {
    die("Falha na conxão com o banco: " . mysqli_connect_error());
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

$sql = "INSERT INTO clientes (nome, cpf, data_nascimento, categoria, endereco, senha);
        VALUES ('$nome', '$cpf', '$data_nascimento', '$categoria', '$endereco', '$senha')";

if (mysqli_query($conexao, sql)) {
    echo "<h2>Cliente cadastrado com sucesso!</h2>";
    echo "<a href='index (1).html'>Ir para a tela de Logiun</a>";
}

    mysqli_close($conexao);
?>
