<?php

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Users.php';
require_once '../models/Medicalspecialities.php';
require_once '../models/RDV.php';
require_once '../models/Patient.php';

$patient = new Patient();
$AllpatientArray = $patient->getallPatients();
$SpecificPatient = $patient->getSpecificPatient($_GET['patient']);


$ModifyPatient = $patient->modifyPatient($SpecificPatient[0]['patients_lastname'], $SpecificPatient[0]['patients_firstname'], $SpecificPatient[0]['patients_phonenumber'], $SpecificPatient[0]['patients_address'], $SpecificPatient[0]['patients_mail'], $SpecificPatient[0]['patients_id']);

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


    if (isset($_POST['patientPhone'])) {
        if (empty($_POST['patientPhone'])) {
            $errors['patientPhone'] = '*Numéro de téléphone obligatoire';
        } else if (!preg_match($regexPhoneNumber, $_POST['patientPhone'])) {
            $errors['patientPhone'] = "* format invalide";
        }
    }

    if (isset($_POST['patientMail'])) {
        if($patient->getSpecificPatient($_GET['patientMail']) == $_GET['patientMail']){

        }
        $PatientObj = new Patient();
        if ($PatientObj->checkIfPatientMailExists($_POST['patientMail'])) {
            $errors['patientMail'] = '*Cet email existe déjà';
        }
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
    if (count($errors) == 0 ) {
        $lastname = htmlspecialchars($_POST['patientSurname']);
        $firstname = htmlspecialchars($_POST['patientName']);
        $phoneNumber = htmlspecialchars($_POST['patientPhone']);
        $address = htmlspecialchars($_POST['patientAddress']);
        $mail = htmlspecialchars($_POST['patientMail']);

        $patient = new Patient();
        $AllpatientArray = $patient->getallPatients();
        $SpecificPatient = $patient->getSpecificPatient($_GET['patient']);
        $ModifyPatient = $patient->modifyPatient($lastname,$firstname, $phoneNumber, $address, $mail, $SpecificPatient[0]['patients_id']  );

        header('Location: dashboard.php'); 
    }
}

