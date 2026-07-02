<?php

require_once("../config/sessao.php");

session_unset();

session_destroy();

header("Location: ../index.php");

exit();

?>