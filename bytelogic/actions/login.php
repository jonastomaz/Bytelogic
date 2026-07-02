<?php

require_once("../config/conexao.php");

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario
        WHERE email='$email'
        AND senha='$senha'";

$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){

    $usuario = mysqli_fetch_assoc($resultado);

    $_SESSION["id_usuario"] = $usuario["id_usuario"];
    $_SESSION["nome"] = $usuario["nome"];
    $_SESSION["admin"] = $usuario["admin"];

    if($usuario["admin"] == 1){

        header("Location: ../pages/admin/inicio.php");

    }else{

        header("Location: ../pages/inicio.php");

    }

}else{

    $_SESSION["erro"] = "Email ou senha inválidos.";

    header("Location: ../pages/login.php");

}

exit();