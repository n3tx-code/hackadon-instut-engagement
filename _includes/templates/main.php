<!DOCTYPE html>
    <html lang="fr">
    <head>
        <?php     require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/style.php");     ?>
    </head>
    <body>
        <?php
            if(isset($_SESSION['USER'])) {
                require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/navbar.php");
            }
            ?>
        <div class="container-fluid" id="wrapper">
            <?php     require_once ($_SERVER['DOCUMENT_ROOT'] . "/_includes/error.php");     errorManager();
            require_once ($_SERVER['DOCUMENT_ROOT'] . "/_includes/success.php");     successManager();
            if(isset($content)) {
                echo $content;
            } else {
                echo "Une erreur est survenue";
            }
            //require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/footer.php");
            ?>
        </div>
    </body>
</html>

