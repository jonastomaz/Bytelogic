<?php

if(isset($_SESSION['mensagem'])){

    ?>

    <div class="mensagem">

        <?= $_SESSION['mensagem']; ?>

    </div>

    <?php

    unset($_SESSION['mensagem']);

}

?>