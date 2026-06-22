<?php
$conexao = mysqli_connect(
    "localhost",
    "root",
    "",
    "bancodados"
);

if (!$conexao) {
    die("Falha na conexão com o banco: " . mysqli_connect_error());
}

$nome = $_POST['nomeVendedor'];
$email = $_POST['email'];
$cpf = $_POST['cpfVen'];
$nomeLoja = $_POST['nomeLoja'];
$cnpj = $_POST['cnpj'];
$categoriaLoja = $_POST['categoriaLoja'];
$telefone = $_POST['telefone'];
$dataNascimento = $_POST['dataNascimento'];
$senha = $_POST['senha'];
$confirmarSenha = $_POST['confirmarSenha'];

if ($senha != $confirmarSenha) {
    die("As senhas não coincidem!");
}

$sql = "INSERT INTO vendedores (nome, email, cpf, nome_loja, cnpj, categoria_loja, telefone, data_nascimento, senha) 
        VALUES ('$nome', '$email', '$cpf', '$nomeLoja', '$cnpj', '$categoriaLoja', '$telefone', '$dataNascimento', '$senha')";

if (mysqli_query($conexao, $sql)) {
    echo "<h2>Vendedor cadastrado com sucesso!</h2>";
    echo "<a href='index.html'>Ir para a tela de Login</a>";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
