<?php

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Users.php';
require_once '../models/Medicalspecialities.php';
require_once '../models/RDV.php'; 
require_once '../models/Patient.php';


$RDV = new Appointment(); 
$SpecificAppointmentArray = $RDV->getSpecificAppointment($_SESSION['user']['users_mail']); 
$AllAppointmentArray = $RDV->getAllAppointement( ); 
// $SpecificAppointment = $patient->getAppointementPatient($_GET['rdv']); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $RDV->deleteAppointment($_POST['delete']);
    }
}

$AllAppointmentArray = $RDV->getAllAppointement();



