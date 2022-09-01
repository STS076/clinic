<?php

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Users.php';
require_once '../models/Medicalspecialities.php';
require_once '../models/RDV.php';
require_once '../models/Patient.php';


$patient = new Patient();
// $SpecificPatient = $patient->getSpecificPatient($patient['delete']);
// var_dump($AllpatientArray); 

// -> faire appel à. en l'espèce le nouvel objet $patient va appeler la fonction getallPatient


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $patient->deletePatient($_POST['delete']);
    }
}

$AllpatientArray = $patient->getallPatients();
