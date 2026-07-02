<?php
require_once("../config/sessao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Início - ByteLogic</title>

    <link rel="stylesheet" href="../css/inicio.css">

</head>

<body>

<header>

    <div class="logo">

        <img src="../imagens/logo1.jpg" alt="Logo">

        BYTELOGIC

    </div>

    <button
        class="profile-btn"
        onclick="window.location.href='../pages/auth/perfil.php'">
    </button>

</header>

<div class="content">

    <div class="left-div">

        <a href="../pages/auth/materiais.php" class="menu-btn">
            Materiais para Estudo
        </a>

        <a href="../pages/auth/questoes.php" class="menu-btn">
            Questões
        </a>

        <a href="../pages/auth/aulas.php" class="menu-btn">
            Recomendações de Aulas
        </a>

        <a href="../pages/auth/sobre.html" class="menu-btn">
            Sobre Nós
        </a>

    </div>

    <div class="right-div">

        <div class="overlay"></div>

        <h2>

            Aprenda lógica de programação<br>

            e dê os primeiros passos para se tornar<br>

            <span class="highlight">

                um desenvolvedor!

            </span>

        </h2>

    </div>

</div>

</body>

</html>