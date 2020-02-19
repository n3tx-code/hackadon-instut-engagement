<?php

function successManager()
{

    $tab_success = array(
        "signIn" => "Votre inscription a bien été prise en compte.<br> Vous pouvez maintenant vous connectés",
        "logOut" => "Vous avez été déconnecter",
        "mdp" => "Mot de passe réinitialiser"
    );

    $success_occured = false;

    $success_msg = "Action réussie";

    if(isset($_GET['s']) and !empty($_GET['s']))
    {
        $s = htmlspecialchars($_GET['s']);
        $success_msg = $tab_success[$s];
        $success_occured = true;
    }
    elseif(isset($GLOBALS['success']))
    {
        $success_msg = $GLOBALS['success'];
        unset($GLOBALS['success']);
        $success_occured = true;
    }

    if($success_occured){
        echo '<div class="row" style="position: absolute; width: 100%; z-index: 7">
            <div class="col-md-6 offset-md-3 msg bg-success text-white text-center animated pulse">
                '. $success_msg .'
            </div>
        </div>';
    }
}
