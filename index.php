<?php
session_start();

if (isset($_SESSION['USER'])) {
    // todo : show page bénévoles ou lauréats
} else {
    if(isset($_POST['email']) AND isset($_POST['pwd'])) {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/models/User.php");
        $user = new User();
        $user->logIn($_POST['email'], $_POST['pwd']);
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/views/home.php");

    require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/main.php");
}
