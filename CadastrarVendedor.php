<?php
$conexao = mysqli_connect(
    "localhost",
    "root",
    "",
    "bancodados"
);

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

echo "<h2>Vendedor cadastrado com sucesso!</h2>";

echo "Nome: $nome <br>";
echo "Email: $email <br>";
echo "CPF: $cpf <br>";
echo "Loja: $nomeLoja <br>";
echo "CNPJ: $cnpj <br>";
echo "Categoria: $categoriaLoja <br>";
echo "Telefone: $telefone <br>";
?>
