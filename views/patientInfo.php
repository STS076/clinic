<?php
session_start();

require_once '../controllers/patientInfo-controller.php';
// var_dump($SpecificPatient);
// var_dump($_GET); 
include('templates/header.php'); ?>


<main class="border border-secondary bg-danger p-5">

    <div class="container rounded d-flex align-items-center flex-column  bg-white   ">
        <div class="row m-5">
            <div class="col m-5">
                <p class="fst-italic fw-bold fs-4 text-center"><?= $SpecificPatient[0]['patients_firstname'] ?> <?= $SpecificPatient[0]['patients_lastname'] ?></p>
                <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Numéro de téléphone</th>
                        <th class="text-center">Adresse</th>
                        <th class="text-center">Adresse email</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center mx-5 px-5" ><?= $SpecificPatient[0]['patients_phonenumber'] ?></td>
                        <td class="text-center mx-5 px-5" ><?= $SpecificPatient[0]['patients_address']?></td>
                        <td class="text-center mx-5 px-5" ><?= $SpecificPatient[0]['patients_mail']?></td>        
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