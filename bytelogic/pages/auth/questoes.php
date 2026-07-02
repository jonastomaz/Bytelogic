<?php

require_once("../config/sessao.php");
require_once("../config/conexao.php");

$sql = "SELECT * FROM questao";
$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Questões - ByteLogic</title>

    <link rel="stylesheet" href="../css/questoes.css">

</head>

<body>

<?php include("../includes/header.php"); ?>

<div class="content">

    <?php include("../includes/menu.php"); ?>

    <div class="right-div">

        <?php

        if(mysqli_num_rows($resultado) > 0){

            while($questao = mysqli_fetch_assoc($resultado)){

        ?>

        <div class="questao-box">

            <h3>

                Questão <?= $questao["id_questao"] ?>

            </h3>

            <p>

                <?= $questao["enunciado_questao"] ?>

            </p>

            <p>

                <strong>Categoria:</strong>

                <?= $questao["nome_categoria"] ?>

            </p>

            <p>

                <strong>Assunto:</strong>

                <?= $questao["assunto"] ?>

            </p>

            <a

                class="responder-btn"

                href="pages/auth/responder_questao.php?id=<?= $questao["id_questao"] ?>">

                Responder

            </a>

        </div>

        <?php

            }

        }else{

            echo "<h2>Nenhuma questão cadastrada.</h2>";

        }

        ?>

    </div>

</div>

</body>

</html>