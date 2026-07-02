<?php
require_once("../../config/session.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - ByteLogic</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/login.css">

</head>

<body>

<div class="container">

    <div class="form-container">

        <div class="left">

            <h1>
                Faça login <br>
                e volte a estudar
            </h1>

        </div>

        <div class="right">

            <div class="card-form">

                <h2>Login</h2>

                <form action="../actions/login.php" method="POST">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        required
                    >

                    <label>Senha</label>

                    <input
                        type="password"
                        name="senha"
                        required
                    >

                    <button type="submit">

                        Fazer Login

                    </button>

                </form>

                <p>

                    Ainda não possui conta?

                    <a href="cadastro.php">

                        Cadastre-se

                    </a>

                </p>

            </div>

        </div>

    </div>

</div>

</body>

</html>