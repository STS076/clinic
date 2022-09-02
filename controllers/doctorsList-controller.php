<?php
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Users.php';
require_once '../models/Medicalspecialities.php';
require_once '../models/RDV.php'; 
require_once '../models/Patient.php';

$user = new Users();
$doctor = new Doctors();
$allDoctorsArray = $doctor->getAllDoctors();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $specificDoctor = $doctor->getSpecificDoctor($_POST['delete']); 
        $user->deleteUser($specificDoctor[0]['doctors_mail']);
        $doctor->deleteDoctor($_POST['delete']);
    }
}
$allDoctorsArray = $doctor->getAllDoctors();
