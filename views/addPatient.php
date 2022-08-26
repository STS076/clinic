<?php
session_start();

require_once '../controllers/addPatient-controller.php';
include('templates/header.php'); ?>

<main class="border border-secondary bg-danger p-5">

    <div class="container rounded d-flex align-items-center flex-column  bg-white p-5">

        <p class="fw-bold fs-4 fst-italic p-2">Ajouter un nouveau patient : </p>

        <form method="POST" class="col-lg-5 col-11" action="">

            <div class="d-flex flex-column">
                <label class="py-2">Nom du patient : <span class="text-danger"><?= isset($errors['patientSurname']) ? $errors['patientSurname'] : '' ?></span></label>
                <input type="text" id="patientSurname" value="<?= isset($_POST['patientSurname']) ? $_POST['patientSurname'] : '' ?>" name="patientSurname">

            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Prénom du patient : <span class="text-danger"><?= isset($errors['patientName']) ? $errors['patientName'] : '' ?></span></label>
                <input type="text" id="patientName" value="<?= isset($_POST['patientName']) ? $_POST['patientName'] : '' ?>" name="patientName">

            </div>

            <!-- <div class="d-flex flex-column">
                <label class="py-2">Âge du patient : <span class="text-danger"><?= isset($errors['patientAge']) ? $errors['patientAge'] : '' ?></span></label>
                <input type="text" id="patientAge" value="<?= isset($_POST['patientAge']) ? $_POST['patientAge'] : '' ?>" name="patientAge">
            </div> -->

            <!-- <div class="d-flex flex-column">
                <label class="py-2">Sexe : <span class="text-danger"><?= isset($errors['patientSex']) ? $errors['patientSex'] : '' ?></span></label>
                <input type="text" id="patientSex" value="<?= isset($_POST['patientSex']) ? $_POST['patientSex'] : '' ?>" name="patientSex">

            </div> -->
            <!-- 
            <div class="d-flex flex-column">
                <label class="py-2">Numéro de sécurité sociale : <span class="text-danger"><?= isset($errors['patientSocial']) ? $errors['patientSocial'] : '' ?></span></label>
                <input type="text" id="patientSocial" value="<?= isset($_POST['patientSocial']) ? $_POST['patientSocial'] : '' ?>" name="patientSocial">
            </div> -->

            <div class="d-flex flex-column">
                <label class="py-2">Numéro de téléphone : <span class="text-danger"><?= isset($errors['patientPhone']) ? $errors['patientPhone'] : '' ?></span></label>
                <input type="text" id="patientPhone" value="<?= isset($_POST['patientPhone']) ? $_POST['patientPhone'] : '' ?>" name="patientPhone">
            </div>

            <div class="d-flex flex-column">
                <label class="py-2">Adresse : <span class="text-danger"><?= isset($errors['patientAddress']) ? $errors['patientAddress'] : '' ?></label>
                <input type="text" id="patientAddress" value="<?= isset($_POST['patientAddress']) ? $_POST['patientAddress'] : '' ?>" name="patientAddress">
            </div>


            <div class="d-flex flex-column">
                <label class="py-2">Email du patient : <span class="text-danger"><?= isset($errors['patientMail']) ? $errors['patientMail'] : '' ?></label>
                <input id="patientMail" value="<?= isset($_POST['patientMail']) ? $_POST['patientMail'] : '' ?>" name="patientMail">
                <!-- type="email" permet d'avoir une erreur html auto si le format n'est pas remplis -->
            </div>


            <div class="text-center pt-5">
                <button class="btn btn-danger" value="connect">Ajouter</button>
            </div>

        </form>

        <div class="text-center pt-5">
            <a href="dashboard.php"> <button class="btn btn-info text-white" type="submit" value="connect">retour</button></a>

        </div>
    </div>



</main>


<?php include('templates/footer.php'); ?>