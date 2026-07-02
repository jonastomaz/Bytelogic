<?php

require_once("../../config/session_admin.php");
require_once("../../config/conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<title>Cadastrar Questão</title>

<link rel="stylesheet" href="../../assets/css/cadastrarQuestao.css">

</head>

<body>

<?php include("../../includes/header_admin.php"); ?>

<div class="container">

<form action="../../actions/cadastrarQuestao.php" method="POST">

<h2>Cadastrar Questão</h2>

<label>Categoria</label>

<select name="categoria" required>

<?php

$sql="SELECT * FROM categoria";

$result=mysqli_query($conexao,$sql);

while($row=mysqli_fetch_assoc($result)){

?>

<option value="<?= $row['nome_categoria'] ?>">

<?= $row['nome_categoria'] ?>

</option>

<?php } ?>

</select>

<br><br>

<label>Assunto</label>

<select name="assunto" required>

<?php

$sql="SELECT * FROM assunto";

$result=mysqli_query($conexao,$sql);

while($row=mysqli_fetch_assoc($result)){

?>

<option value="<?= $row['assunto'] ?>">

<?= $row['assunto'] ?>

</option>

<?php } ?>

</select>

<br><br>

<label>Enunciado</label>

<textarea
name="enunciado"
required></textarea>

<br>

<label>Alternativa A</label>

<input
type="text"
name="alternativa_a"
required>

<label>Alternativa B</label>

<input
type="text"
name="alternativa_b"
required>

<label>Alternativa C</label>

<input
type="text"
name="alternativa_c"
required>

<label>Alternativa D</label>

<input
type="text"
name="alternativa_d"
required>

<label>Alternativa E</label>

<input
type="text"
name="alternativa_e"
required>

<br>

<label>Alternativa Correta</label>

<select
name="correta"
required>

<option>A</option>

<option>B</option>

<option>C</option>

<option>D</option>

<option>E</option>

</select>

<br><br>

<button type="submit">

Cadastrar Questão

</button>

</form>

</div>

</body>
</html>