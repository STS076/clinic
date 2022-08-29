<?php
session_start();
require_once '../controllers/dashboard-controller.php';
include('templates/header.php'); ?>


<main class="border border-secondary bg-danger">



    <div class="container rounded d-flex align-items-center flex-column  bg-white p-5 my-5 ">
        <p class="fw-bold fs-4 fst-italic p-2 text-center"> BIENVENUE </p>
        <div class="row align-item">
            <div class="col text-center m-3">
                <a href="addPatient.php"> <button class="text-center text-center btn btn-danger bouton">Ajouter un patient <i class="ms-1 fs-4 bi bi-person-rolodex text-white"></i></button></a>
            </div>
            <div class="col text-center m-3">
                <a href="patientList.php"> <button class="text-center text-center btn btn-danger bouton">Gestion des patients <i class="ms-1 fs-4 bi bi-person-rolodex text-white"></i></button></a>
            </div>
        </div>
        <div class="row align-item">
            <div class="col text-center m-3">
                <button class="text-center text-center btn btn-danger bouton">Ajouter un RDV <i class="ms-1 fs-4 bi bi-calendar-week text-white"></i></button>
            </div>
            <div class="col text-center m-3">
                <button class="text-center text-center btn btn-danger bouton">Gestion des RDV <i class="ms-1 fs-4 bi bi-calendar-week text-white"></i></button>
            </div>
        </div>
        <div class="row align-item">
            <div class="col text-center m-3">
                <a href="addDoctors.php"> <button class="text-center text-center btn btn-danger bouton">Ajouter un spécialiste <i class="ms-1 fs-4 bi bi-file-earmark-medical text-white"></i></button></a>
            </div>
            <div class="col text-center m-3">
                <a href="doctorsList.php"><button class="text-center text-center btn btn-danger bouton">Gestion des spécialistes <i class="ms-1 fs-4 bi bi-file-earmark-medical text-white"></i></button>
            </div></a>
        </div>
        <div class="mt-2">

            <a class="text-decoration-none" href="logout.php">
                <button class="btn text-white bg-info"> DECONNEXION</button>
            </a>

        </div>
    </div>

</main>

<?php
include('templates/footer.php');
