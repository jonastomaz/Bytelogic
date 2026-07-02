<?php
require_once("../config/sessao.php");
require_once("../config/conexao.php");

$idUsuario = $_SESSION['id_usuario'];

$sql = "SELECT nome, email, foto
        FROM usuario
        WHERE id_usuario = '$idUsuario'";

$resultado = mysqli_query($conexao, $sql);

$usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BYTELOGIC - Meu Perfil</title>

    <link rel="stylesheet" href="../css/perfil.css">

</head>

<body>

<div class="blur-overlay"></div>

<header>

    <div class="logo">

        <img src="../imgagens/logo1.jpg" alt="Logo">

        BYTELOGIC

    </div>

</header>

<div class="profile-container">

    <div class="profile-content">

        <div class="profile-img">

            <?php

            if(!empty($usuario['foto'])){

                ?>

                <img src="../uploads/perfil/<?php echo $usuario['foto']; ?>">

                <?php

            }else{

                ?>

                <img src="../imagens/nonProfile.png">

                <?php

            }

            ?>

        </div>

        <div class="profile-name">

            <?php echo $usuario['nome']; ?>

        </div>

        <div class="profile-email">

            <?php echo $usuario['email']; ?>

        </div>

        <div class="profile-links">

            <a href="../actions/logout.php" class="btn-sair">

                Sair

            </a>

        </div>

    </div>

</div>

</body>

</html>