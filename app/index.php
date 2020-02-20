<?php
session_start();

if (isset($_SESSION['USER'])) {
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/models/User.php");
    $user = new User();
    $user->get();

    if($user->isBenevole()) {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/views/benevole.php");
    } else if ($user->isLaureat()) {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/views/laureat.php");
    }
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/main.php");
} else {
    header("Location: /");


}
