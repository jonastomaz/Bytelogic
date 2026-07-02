<?php

require_once("config/sessao.php");

if(isset($_SESSION["cpf"])){

    if($_SESSION["admin"] == 1){

        header("Location: pages/auth/pagina_admin/inicioAdmin.php");

    }else{

        header("Location: pages/auth/inicio.php");

    }

    exit();

}

?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro - ByteLogic</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/login.css">

    </head>

    <body>

        <div class="container">

            <div class="form-container">

                <div class="left">

                    <h1>

                            Cadastre-se<br>

                            e venha aprender

                    </h1>

                </div>

                    <div class="right">

                    <div class="card-form">

                    <h2>Cadastro</h2>

                    <form action="actions/cadastro.php" method="POST">

                        <label>Nome</label>

                        <input
                        type="text"
                        name="nome"
                        required>

                        <label>CPF</label>

                        <input
                        type="text"
                        name="cpf"
                        required>

                        <label>Email</label>

                        <input
                        type="email"
                        name="email"
                        required>

                        <label>Senha</label>

                        <input
                        type="password"
                        name="senha"
                        required>

                        <button type="submit">

                        Cadastrar

                        </button>

                    </form>

                    <p>

                        Já possui conta?

                        <a href="pages/auth/login.php">

                            Faça Login

                        </a>

                    </p>

                    </div>

                </div>

            </div>

        </div>

    </body>

</html>