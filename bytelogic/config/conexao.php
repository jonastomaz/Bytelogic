<?php

require_once "constantes.php";

$con = mysqli_connect(HOST, USUARIO, SENHA, BANCO);

if (!$con) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

mysqli_set_charset($con, "utf8");

?>