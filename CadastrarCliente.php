<?php

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

echo "<h2>Cliente cadastrado com sucesso!</h2>";

echo "Nome: $nome <br>";
echo "CPF: $cpf <br>";
echo "Data de nascimento: $dataNascimento <br>";
echo "Categoria: $categorias <br>";
echo "Endereço: $endereco <br>";

?>
