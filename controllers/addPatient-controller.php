<?php



if (!isset($_SESSION['user'])) {
    header('Location: connection.php');
    exit;
}

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Patient.php';


// nous allons déclencher nos vérifications lors d'une request méthode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // création d'un tableau d'erreurs
    $errors = [];

    $regexName = "/^[a-zA-Z-éèëêâäàöôûùüîïç]+$/";
    $regexPhoneNumber = "/^[0-9]{10}+$/";

    // vérification de l'input login
    if (isset($_POST['patientSurname'])) {
        if (empty($_POST['patientSurname'])) {
            $errors['patientSurname'] = '*Nom obligatoire';
        } else if (!preg_match($regexName, $_POST['patientSurname'])) {
            $errors['patientSurname'] = "* format invalide";
        }
    }

    // vérification de l'input password
    if (isset($_POST['patientName'])) {
        if (empty($_POST['patientName'])) {
            $errors['patientName'] = '*Prénom obligatoire';
        } else if (!preg_match($regexName, $_POST['patientName'])) {
            $errors['patientName'] = "* format invalide";
        }
    }

    // if (isset($_POST['patientAge'])) {
    //     if (empty($_POST['patientAge'])) {
    //         $errors['patientAge'] = '*Âge obligatoire';
    //     }
    // }
    // if (isset($_POST['patientSex'])) {
    //     if (empty($_POST['patientSex'])) {
    //         $errors['patientSex'] = '*Sexe obligatoire';
    //     }
    // }

    // if (isset($_POST['patientSocial'])) {
    //     if (empty($_POST['patientSocial'])) {
    //         $errors['patientSocial'] = '*Numéro de sécurité sociale obligatoire';
    //     }
    // }

    if (isset($_POST['patientPhone'])) {
        if (empty($_POST['patientPhone'])) {
            $errors['patientPhone'] = '*Numéro de téléphone obligatoire';
        } else if (!preg_match($regexPhoneNumber, $_POST['patientPhone'])) {
            $errors['patientPhone'] = "* format invalide";
        }
    }

    if (isset($_POST['patientMail'])) {
        if (empty($_POST['patientMail'])) {
            $errors['patientMail'] = '*Email obligatoire';
        } else if (!filter_var($_POST['patientMail'], FILTER_VALIDATE_EMAIL)) { // si ça ne passe pas le filter var : FILTER_VALIDATE_EMAIL
            $errors['patientMail'] = '*Mauvais format, ex. mail@mail.com';
        }
    }

    if (isset($_POST['patientAddress'])) {
        if (empty($_POST['patientAddress'])) {
            $errors['patientAddress'] = '*Adresse obligatoire';
        }
    }


    // nous allons déclencher des tests dans la bdd
    if (count($errors) == 0) {
        $lastname = htmlspecialchars($_POST['patientSurname']);
        $firstname = htmlspecialchars($_POST['patientName']);
        $phoneNumber = htmlspecialchars($_POST['patientPhone']);
        $address = htmlspecialchars($_POST['patientAddress']);
        $mail = htmlspecialchars($_POST['patientMail']);

        $patientObj = new Patient();

        $patientObj->addPatient($lastname, $firstname, $phoneNumber, $address, $mail); 

        header('Location: dashboard.php'); 
    }
}
