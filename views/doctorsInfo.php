<?php
session_start();
require_once '../controllers/DoctorsInfo-controller.php';
include('templates/header.php'); ?>


<main class="border border-secondary bg-danger p-5">

    <div class="container rounded d-flex align-items-center flex-column  bg-white   ">
        <div class="row m-5">
            <div class="col m-5">
                <p class="fst-italic fw-bold fs-4 text-center"><?= $SpecificDoctors[0]['doctors_name'] ?> <?= $SpecificDoctors[0]['doctors_lastname'] ?></p>
                <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Numéro de téléphone</th>
                        <th class="text-center">Adresse email</th> 
                        <th class="text-center">Spécialité</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center mx-5 px-5" ><?= $SpecificDoctors[0]['doctors_phonenumber'] ?></td>
                        <td class="text-center mx-5 px-5" ><?= $SpecificDoctors[0]['doctors_mail']?></td>   
                        <td class="text-center mx-5 px-5" ><?= $SpecificDoctors[0]['medicalspecialities_name']?></td>      
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        <div class="text-center py-2 mb-5">
            <a href="dashboard.php"> <button class="btn btn-info text-white" type="submit" value="connect">retour</button></a>

        </div>
    </div>


</main>


<?php include('templates/footer.php'); ?>