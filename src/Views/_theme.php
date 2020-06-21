<?php
require_once __DIR__ . "/../../vendor/autoload.php";

use Ecomais\Web\Bundles;
use Ecomais\Controllers\ComponenteElement as componente;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <?= Bundles::renderCss(["css/bootstrap","css/alertify","fontawesome"]); ?>
    <link rel='stylesheet' type='text/css' href=<?= renderUrl("/src/assets/css/estilo.css") ?> />
    <link rel="stylesheet" type='text/css' href=<?= renderUrl("/src/assets/css/modalLogin.css") ?> />
    <?= $this->section("css"); ?>
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <?php
            if (!$this->section("error")):
                echo componente::navBarHome();
                echo componente::modalLogin();
            endif;
        ?>
    </header>
    <main>
        <?php
        if ($this->section("error")) :
            echo $this->section("error");
        else :
            echo $this->section("content");
        endif;
        ?>
    </main>
    <footer>
        <?php
        if ($this->section('footer')) :
            echo $this->section('footer');
        endif;
        ?>
    </footer>
<?= 
    Bundles::renderJs([
    "js/jquery",
    "js/jqueryMask", 
    "js/bootstrap",
    "js/alertify",
    "js/login"
    ]); 
?>
<?php
    echo $this->section("scripts");
    echo"<script>
            const BASE_URL = '" . BASE_URL . "';
        </script>";
?>
</body>

</html>