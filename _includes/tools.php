<?php

function checkVarCharLength($char)
{
    if(strlen($char) < 255)
    {
        return true;
    }
    return false;
}

function emailIsUnique($email)
{
    $req_email = $GLOBALS['bdd']->prepare("SELECT COUNT(*) FROM user_cm WHERE email = ?");
    $req_email->execute(array($email));

    if($req_email->fetchColumn() == 0)
    {
        return true;
    }

    return false;
}

function generateToken()
{
    $token_is_unique = false;
    $token = "";
    while(!$token_is_unique)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 15; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $req_token = $GLOBALS['bdd']->prepare("SELECT COUNT(*) FROM User WHERE TOKEN = ?");
        $req_token->execute(array($randomString));
        if($req_token->fetchColumn() == 0)
        {
            $token = $randomString;
            $token_is_unique = true;
        }
    }
    return $token;

}