<?php

if (!isset($_SESSION['user'])) {
    header('Location: connection.php');
    exit;
}

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Users.php';
require_once '../models/Medicalspecialities.php';
require_once '../models/RDV.php'; 
require_once '../models/Patient.php';

$patient = new Doctors();
$allDoctorsArray = $patient->getAllDoctors(); 

$patient = new Patient(); 
$AllpatientArray = $patient->getallPatients(); 

$speciality = new Medical();
$allSpecialitiesArray = $speciality->getAllSpecialities();

// nous allons déclencher nos vérifications lors d'une request méthode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // création d'un tableau d'erreurs
    $errors = [];

    $regexName = "/^[a-zA-Z-éèëêâäàöôûùüîïç]+$/";
    $regexPhoneNumber = "/^[0-9]{10}+$/";

    if (isset($_POST['RDVDate'])) {
        if (empty($_POST['RDVDate'])) {
            $errors['RDVDate'] = '*Date obligatoire';
        }
    }

    if (isset($_POST['RDVHour'])) {
        if (empty($_POST['RDVHour'])) {
            $errors['RDVHour'] = '*Heure obligatoire';
        }
    }



    if (isset($_POST['RDVDescription'])) {
        if (empty($_POST['RDVDescription'])) {
            $errors['RDVDescription'] = '*Description obligatoire';
        }
    }

    if (isset($_POST['patient'])) {
        if (empty($_POST['patient'])) {
            $errors['patient'] = '*Patient obligatoire';
        }
    }

    if (isset($_POST['doctor'])) {
        if (empty($_POST['doctor'])) {
            $errors['doctor'] = '*Médecin obligatoire';
        }
    }


    if (count($errors) == 0) {
        $rendezvous_date = htmlspecialchars($_POST['RDVDate']);
        $rendezvous_hour = htmlspecialchars($_POST['RDVHour']);
        $rendezvous_description = htmlspecialchars($_POST['RDVDescription']);
        $patients_id_patients = htmlspecialchars($_POST['patient']);
        $doctors_id_doctors = htmlspecialchars($_POST['doctor']);

        $RDVObj = new Appointment();

        $RDVObj->addAppointment($rendezvous_date,  $rendezvous_hour,  $rendezvous_description,  $patients_id_patients, $doctors_id_doctors); 

        header('Location: dashboard.php'); 
    }
}
