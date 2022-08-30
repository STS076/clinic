<?php

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Users.php';

// $login = "sophie";
// $passwordHash = '$2y$10$qzpuB2nn5O6Gr9SkFERwre7Nd2NN8.N0034dpUfeczvpj71Hh7kLe';
// $password = password_hash('sophie', PASSWORD_DEFAULT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    // $regexName = "/^[a-zA-Z-éèëêâäàöôûùüîïç]+$/";

    if (isset($_POST['pseudo'])) {
        if (empty($_POST['pseudo'])) {
            $errors['pseudo'] = "* Veuillez rentrer votre identifiant";
        }

        // else if (($_POST['pseudo']) != $login) {
        //     $errors['pseudo'] = "* Le pseudo est invalide";
        // }
    }

    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = "* Veuillez rentrer un mot de passe";
        }

        // else if (!password_verify($_POST['password'], $passwordHash)) {
        //     // si le champ qu'on rentre correspond au hash. 
        //     $errors['password'] = "* Le mot de passe est invalide";
        // }
    }

    if (count($errors) == 0) {

        $usersObj = new Users();
        // flèche cherche à utiliser une méthode présente dans la classe, 
        // this reprend la classe, et permet de définir un attribut 
        if ($usersObj->checkIfMailExists($_POST['pseudo'])) {

            $usersInfos =  $usersObj->getInfosUsers($_POST['pseudo']);
            // si le mail existe alors on va regarder si il existe un mot de passe et s'il est correct
            if (password_verify($_POST['password'], $usersInfos['users_password'])) {
                $_SESSION['user'] = $usersInfos;

                if ($_SESSION['user']['role_id_role'] == 2) {
                    header('Location: dashboard.php');
                } else {
                    header('Location: rdvList.php');
                }
                // header('Location: dashboard.php');
                exit;
            } else {
                $errors['connection'] = "Identifiant ou MDP incorrect";
            }
        }
    } else {
        $errors['connection'] = "Identifiant ou MDP incorrect";
    }
}

// session start sert à manipuler les variables de session, mail il faut créer une variable session user pour les créer. 
