<?php

require_once("../config/conexao.php");
require_once("../config/session.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: ../pages/questoes.php");
    exit();

}

// Verifica se o usuário está logado
if (!isset($_SESSION["cpf"])) {

    header("Location: ../pages/login.php");
    exit();

}

$cpf = $_SESSION["cpf"];

$idQuestao = $_POST["id_questao"];
$resposta = $_POST["alternativa"];

// Busca o assunto e categoria da questão
$sqlQuestao = "SELECT assunto, nome_categoria
               FROM questao
               WHERE id_questao = '$idQuestao'";

$resultadoQuestao = mysqli_query($conexao, $sqlQuestao);

if(mysqli_num_rows($resultadoQuestao) == 0){

    $_SESSION["erro"] = "Questão não encontrada.";

    header("Location: ../pages/questoes.php");
    exit();

}

$questao = mysqli_fetch_assoc($resultadoQuestao);

$assunto = $questao["assunto"];
$categoria = $questao["nome_categoria"];

$data = date("Y-m-d");

// Chama a procedure criada no banco
$sql = "CALL cadastrar_resposta_usuario(
        '$cpf',
        '$idQuestao',
        '$resposta',
        '$data',
        '$assunto',
        '$categoria'
)";

if(mysqli_query($conexao,$sql)){

    // Busca a resposta correta
    $sqlCorreta = "SELECT alternativa_correta
                   FROM alternativa_correta
                   WHERE id_questao='$idQuestao'";

    $resultadoCorreta = mysqli_query($conexao,$sqlCorreta);

    $correta = mysqli_fetch_assoc($resultadoCorreta);

    if($correta["alternativa_correta"] == $resposta){

        $_SESSION["resultado"] = "✅ Resposta correta!";

    }else{

        $_SESSION["resultado"] =
        "❌ Resposta incorreta.<br>Alternativa correta: "
        .$correta["alternativa_correta"];

    }

}else{

    $_SESSION["resultado"] = "Erro ao registrar resposta.";

}

header("Location: ../pages/responder_questao.php?id=".$idQuestao);

exit();

?>