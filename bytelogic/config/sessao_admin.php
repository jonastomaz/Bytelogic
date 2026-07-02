<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["cpf"])) {

    header("Location: ../index.php");
    exit();

}

if ($_SESSION["admin"] != 1) {

    header("Location: ../paginas/inicio.php");
    exit();

}

?>