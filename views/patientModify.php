<?php
session_start();
require_once '../controllers/patientModify-controller.php';
include('templates/header.php'); ?>


<main class="border border-secondary bg-danger p-5">

    <div class="container rounded d-flex align-items-center flex-column  bg-white p-5">

        <!-- <p class="fw-bold fs-4 fst-italic p-2">Modifier les données d'un patient : </p> -->

        <form method="POST" class="col-lg-5 col-11" action="">

            <p class="fw-bold fs-4 fst-italic p-2" value="<?= $SpecificPatient[0]['patients_id'] ?>">Modifier les données d'un patient : </p>

            <div class="d-flex flex-column">
                <label class="py-2">Nom du patient : <span class="text-danger"><?= isset($errors['patientSurname']) ? $errors['patientSurname'] : '' ?></span></label>
                <input type="text" id="patientSurname" value="<?= $SpecificPatient[0]['patients_lastname'] ?>" name="patientSurname">

            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Prénom du patient : <span class="text-danger"><?= isset($errors['patientName']) ? $errors['patientName'] : '' ?></span></label>
                <input type="text" id="patientName" value="<?= $SpecificPatient[0]['patients_firstname'] ?>" name="patientName">

                <div class="d-flex flex-column">
                    <label class="py-2">Numéro de téléphone : <span class="text-danger"><?= isset($errors['patientPhone']) ? $errors['patientPhone'] : '' ?></span></label>
                    <input type="text" id="patientPhone" value="<?= $SpecificPatient[0]['patients_phonenumber'] ?>" name="patientPhone">
                </div>

                <div class="d-flex flex-column">
                    <label class="py-2">Adresse : <span class="text-danger"><?= isset($errors['patientAddress']) ? $errors['patientAddress'] : '' ?></label>
                    <input type="text" id="patientAddress" value="<?= $SpecificPatient[0]['patients_address'] ?>" name="patientAddress">
                </div>

                <div class="d-flex flex-column">
                    <label class="py-2">Email du patient : <span class="text-danger"><?= isset($errors['patientMail']) ? $errors['patientMail'] : '' ?></label>
                    <input id="patientMail" value="<?= $SpecificPatient[0]['patients_mail'] ?>" name="patientMail">
                    <!-- type="email" permet d'avoir une erreur html auto si le format n'est pas remplis -->
                </div>

                <div class="text-center pt-5">
                    <button class="btn btn-danger" value="connect">Modifier</button>
                </div>

        </form>

        <div class="text-center pt-5">
            <a href="patientList.php" class="btn btn-info text-white" value="connect">retour</a>
        </div>
    </div>



</main>


<?php include('templates/footer.php'); ?>