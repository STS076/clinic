<?php

if (!isset($_SESSION['user'])) {
    header('Location: connection.php');
    exit;
}

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Medicalspecialities.php';

$speciality = new Medical();
$allSpecialitiesArray = $speciality->getAllSpecialities();

// nous allons déclencher nos vérifications lors d'une request méthode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // création d'un tableau d'erreurs
    $errors = [];

    $regexName = "/^[a-zA-Z-éèëêâäàöôûùüîïç]+$/";
    $regexPhoneNumber = "/^[0-9]{10}+$/";

    // vérification de l'input login
    if (isset($_POST['doctorName'])) {
        if (empty($_POST['doctorName'])) {
            $errors['doctorName'] = '*Nom obligatoire';
        } else if (!preg_match($regexName, $_POST['doctorName'])) {
            $errors['doctorName'] = "* format invalide";
        }
    }

    // vérification de l'input password
    if (isset($_POST['doctorSurname'])) {
        if (empty($_POST['doctorSurname'])) {
            $errors['doctorSurname'] = '*Prénom obligatoire';
        } else if (!preg_match($regexName, $_POST['doctorSurname'])) {
            $errors['doctorSurname'] = "* format invalide";
        }
    }


    if (isset($_POST['doctorPhone'])) {
        if (empty($_POST['doctorPhone'])) {
            $errors['doctorPhone'] = '*Numéro de téléphone obligatoire';
        } else if (!preg_match($regexPhoneNumber, $_POST['doctorPhone'])) {
            $errors['doctorPhone'] = "* format invalide";
        }
    }

    if (isset($_POST['doctorMail'])) {
        if (empty($_POST['doctorMail'])) {
            $errors['doctorMail'] = '*Email obligatoire';
        } else if (!filter_var($_POST['doctorMail'], FILTER_VALIDATE_EMAIL)) { // si ça ne passe pas le filter var : FILTER_VALIDATE_EMAIL
            $errors['doctorMail'] = '*Mauvais format, ex. mail@mail.com';
        }
    }

    if (isset($_POST['doctorSpecialty'])) {
        if (empty($_POST['doctorSpecialty'])) {
            $errors['doctorSpecialty'] = '*Merci de choisir une spécialité';
        }
    }


    if (count($errors) == 0) {
        $doctorName = htmlspecialchars($_POST['doctorName']);
        $doctorSurname = htmlspecialchars($_POST['doctorSurname']);
        $doctorPhone = htmlspecialchars($_POST['doctorPhone']);
        $doctorMail = htmlspecialchars($_POST['doctorMail']);
        $medicalspecialities_id_medicalspecialities =  htmlspecialchars($_POST['doctorSpecialty']);

        $doctorObj = new Doctors();
        $doctorObj->addDoctor($doctorName, $doctorSurname, $doctorPhone, $doctorMail, $medicalspecialities_id_medicalspecialities);

        header('Location: dashboard.php');
    }
}
