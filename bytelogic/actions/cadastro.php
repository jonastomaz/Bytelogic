<?php

require_once("../config/conexao.php");

$cpf=$_POST["cpf"];
$nome=$_POST["nome"];
$email=$_POST["email"];
$senha=$_POST["senha"];

$sql="INSERT INTO usuario(cpf,email,senha,nome)
VALUES
(
'$cpf',
'$email',
'$senha',
'$nome'
)";

if(mysqli_query($conexao,$sql)){

header("Location: ../pages/login.php");

}else{

echo "Erro ao cadastrar.";

}