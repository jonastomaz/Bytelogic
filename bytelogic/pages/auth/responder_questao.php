<?php

require_once("../config/sessao.php");
require_once("../config/conexao.php");

if (!isset($_GET["id"])) {
    header("Location: pages/auth/questoes.php");
    exit();
}

$idQuestao = intval($_GET["id"]);

// Busca a questão
$sqlQuestao = "SELECT *
               FROM questao
               WHERE id_questao = '$idQuestao'";

$resultadoQuestao = mysqli_query($conexao, $sqlQuestao);

if (mysqli_num_rows($resultadoQuestao) == 0) {
    die("Questão não encontrada.");
}

$questao = mysqli_fetch_assoc($resultadoQuestao);

// Busca as alternativas
$sqlAlternativas = "SELECT *
                    FROM alternativas
                    WHERE id_questao = '$idQuestao'
                    ORDER BY id_alternativa";

$resultadoAlternativas = mysqli_query($conexao, $sqlAlternativas);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Responder Questão</title>

    <link rel="stylesheet" href="../css/responder_questao.css">

</head>

<body>

<?php include("../includes/header.php"); ?>

<div class="container">

    <h2>

        Questão <?= $questao["id_questao"]; ?>

    </h2>

    <p class="enunciado">

        <?= $questao["enunciado_questao"]; ?>

    </p>

    <form action="../actions/responder_questao.php" method="POST">

        <input
            type="hidden"
            name="id_questao"
            value="<?= $questao["id_questao"]; ?>">

        <?php while($alternativa = mysqli_fetch_assoc($resultadoAlternativas)){ ?>

            <label class="alternativa">

                <input
                    type="radio"
                    name="alternativa"
                    value="<?= $alternativa["id_alternativa"]; ?>"
                    required>

                <strong><?= $alternativa["id_alternativa"]; ?></strong>

                <?= $alternativa["enunciado_alternativa"]; ?>

            </label>

            <br><br>

        <?php } ?>

        <button type="submit">

            Responder

        </button>

    </form>

    <br>

    <?php

    if(isset($_SESSION["resultado"])){

        echo "<div class='resultado'>";
        echo $_SESSION["resultado"];
        echo "</div>";

        unset($_SESSION["resultado"]);

    }

    ?>

    <br>

    <a href="pages/auth/questoes.php">

        Voltar para questões

    </a>

</div>

</body>

</html>