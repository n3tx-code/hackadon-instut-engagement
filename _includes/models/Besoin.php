<?php


class Besoin
{
    public $ID;
    public $ID_Owner;
    public $Title;
    public $Content;
    public $Categories;
    public $Langues;

    function create($title, $content, $categories, $langues) {
        $title = htmlspecialchars($title);
        $content = htmlspecialchars($content);


    }
}