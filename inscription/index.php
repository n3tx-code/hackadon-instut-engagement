<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/models/User.php");

if (isset($_SESSION['USER'])) {
    // todo : show page bénévoles ou lauréats
} else {
    if(isset($_POST['type']) AND isset($_POST['name']) AND !empty($_POST['name']) AND
    isset($_POST['email1']) AND !empty($_POST['email1']) AND
    isset($_POST['email2']) AND !empty($_POST['email2']) AND
    isset($_POST['pwd1']) AND !empty($_POST['pwd1']) AND
    isset($_POST['pwd2']) AND !empty($_POST['pwd2'])
    )
     {
        if($_POST['type'] == "LAUREAT") {
            $user = new User();
            $user->signInLaureat($_POST['email1'], $_POST['email2'], $_POST['pwd1'], $_POST['pwd2'], $_POST['name']);
        } else if($_POST['type'] == "BENEVOLE") {
            $user = new User();
            $user->signInBenevole($_POST['email1'], $_POST['email2'], $_POST['pwd1'], $_POST['pwd2'], $_POST['name']);
        }
    } else {
        if (!empty($_POST)) {
            $GLOBALS['error'] = "Merci de remplir tous les champs";
        }
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/views/inscription.php");

    require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/main.php");
}
