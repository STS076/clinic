<?php
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Medicalspecialities.php';

$patient = new Doctors();
// var_dump($patient); 
$allDoctorsArray = $patient->getAllDoctors(); 
// var_dump($AllpatientArray); 

// -> faire appel à. en l'espèce le nouvel objet $patient va appeler la fonction getallPatient
