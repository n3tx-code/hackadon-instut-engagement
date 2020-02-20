<?php
session_start();

if (isset($_SESSION['USER'])) {
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/models/User.php");
    $user = new User();
    $user->get();

    if(isset($_POST['title']) AND !empty($_POST['title']) AND isset($_POST['content']) AND !empty($_POST['content'])) {
        var_dump($_POST);
    }
    if($user->isBenevole()) {
        header("Location: /app/");
    } else if ($user->isLaureat()) {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/bdd.php");
        $reqLanguages = $GLOBALS['bdd']->query("SELECT * FROM LANGUE_CONTENT ORDER BY NAME");
        $languages = $reqLanguages->fetchAll();

        $reqCategories = $GLOBALS['bdd']->query("SELECT * FROM CATEGORIE_CONTENT");
        $categories = $reqCategories->fetchAll();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/views/add_besoin.php");
    }
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/main.php");
} else {
    header("Location: /");


}
