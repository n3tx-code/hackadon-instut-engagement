<?php

function errorManager()
{

    $tab_errors = array(

    );

    $error_occured = false;

    $error_msg = "une erreur est a eu lieu";

    if(isset($_GET['e']) and !empty($_GET['e']))
    {
        $e = htmlspecialchars($_GET['e']);
        $error_msg = $tab_errors[$e];
        $error_occured = true;
    }
    elseif(isset($GLOBALS['error']))
    {
        $error_msg = $GLOBALS['error'];
        unset($GLOBALS['error']);
        $error_occured = true;
    }

    if($error_occured){
        echo '<div class="row" style="position: absolute; width: 100%; z-index: 7">
            <div class="col-md-6 offset-md-3 msg bg-danger text-white text-center animated pulse">
                '. $error_msg .'
            </div>
        </div>';
    }
}
