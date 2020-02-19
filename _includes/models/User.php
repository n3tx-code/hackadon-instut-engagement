<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/bdd.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/tools.php");

class User
{
    public $id;
    public $email;
    public $type;
    public $name;
    public $token;

    function signInBenevole($email1, $email2, $pwd1, $pwd2, $name) {
        $email1 = htmlspecialchars($email1);
        $email2 = htmlspecialchars($email2);
        $pwd1 = htmlspecialchars($pwd1);
        $pwd2 = htmlspecialchars($pwd2);
        $name = htmlspecialchars($name);

        if(strcmp($email1, $email2) == 0) {
            if(strcmp($pwd1, $pwd2) == 0) {
                $pwd = hash('sha256', $pwd1);
                $reqEmailIsUnique = $GLOBALS['bdd']->prepare("SELECT COUNT(*) FROM User WHERE EMAIL = ?");
                $reqEmailIsUnique->execute(array($email1));
                if($reqEmailIsUnique->fetchColumn() == 0) {
                    $addBenevole = $GLOBALS['bdd']->prepare("INSERT INTO User (EMAIL, PWD, TYPE, NAME, TOKEN) VALUES (?, ?, ?, ?, ?)");
                    $addBenevole->execute(array($email1, $pwd, "BENEVOLE", $name, generateToken()));
                    if($addBenevole->errorCode() == "00000") {
                        $GLOBALS['success'] = "Votre compte a été ajouté. Vous pouvez maintenant vous conectez";
                    } else {
                        $GLOBALS['error'] = "Une erreur est survenue";
                    }
                }
                else {
                    $GLOBALS['error'] = "Adresse mail déjà utilisée  ";
                }
            } else {
                $GLOBALS['error'] = "Mot de passe différents";
            }
        } else {
            $GLOBALS['error'] = "Email différentes";
        }
    }

    function signInLaureat($email1, $email2, $pwd1, $pwd2, $name) {
        $email1 = htmlspecialchars($email1);
        $email2 = htmlspecialchars($email2);
        $pwd1 = htmlspecialchars($pwd1);
        $pwd2 = htmlspecialchars($pwd2);
        $name = htmlspecialchars($name);

        if(strcmp($email1, $email2) == 0) {
            if(strcmp($pwd1, $pwd2) == 0) {
                $pwd = hash('sha256', $pwd1);
                $reqEmailIsAllowed = $GLOBALS['bdd']->prepare("SELECT COUNT(*) FROM LAUREAT_PENDING WHERE email = ?");
                $reqEmailIsAllowed->execute(array($email1));
                if($reqEmailIsAllowed->fetchColumn() == 1) {
                    $addLaureat = $GLOBALS['bdd']->prepare("INSERT INTO User (EMAIL, PWD, TYPE, NAME, TOKEN) VALUES (?, ?, ?, ?, ?)");
                    $addLaureat->execute(array($email1, $pwd, "LAUREAT", $name, generateToken()));
                    if($addLaureat->errorCode() == "00000") {
                        $removeEmail =  $GLOBALS['bdd']->prepare("DELETE FROM LAUREAT_PENDING WHERE email = ? ");
                        $removeEmail->execute(array($email1));
                        $GLOBALS['success'] = "Votre compte a été ajouté. Vous pouvez maintenant vous conectez";
                    } else {
                        $GLOBALS['error'] = "Une erreur est survenue";
                    }
                }
                else {
                    $GLOBALS['error'] = "Votre adresse mail est inconue, merci de contacter l'institut de l'engagement.";
                }
            } else {
                $GLOBALS['error'] = "Mot de passe différents";
            }
        } else {
            $GLOBALS['error'] = "Email différentes";
        }
    }

    function logIn($email, $pwd) {
        $email = htmlspecialchars($email);
        $pwd = hash('sha256', htmlspecialchars($pwd));

        $reqUser = $GLOBALS['bdd']->prepare("SELECT * FROM User WHERE EMAIL = ? AND PWD = ? ");
        $reqUser->execute(array($email, $pwd));
        $user = $reqUser->fetch();
        if($user != null) {
            $_SESSION['USER'] = json_encode($user);
            header("Location: /app/");
            die();
        } else {
            $GLOBALS['error'] = "Email ou mot de passe incorrects";
        }
    }

    function isBenevole() {
        return $this->type == "BENEVOLE";
    }

    function isLaureat() {
        return $this->type == "LAUREAT";
    }
}