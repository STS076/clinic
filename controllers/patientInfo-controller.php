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
