<?php

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Users.php';
require_once '../models/Patient.php';

$patient = new Patient(); 
// var_dump($patient); 
$AllpatientArray = $patient->getallPatients(); 
// var_dump($AllpatientArray); 

// -> faire appel à. en l'espèce le nouvel objet $patient va appeler la fonction getallPatient
