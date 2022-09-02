<?php
session_start();
require_once '../controllers/addRDV-controller.php';
include('templates/header.php'); ?>

<main class="border border-secondary bg-danger p-5">

    <div class="container rounded d-flex align-items-center flex-column  bg-white p-5">

        <p class="fw-bold fs-4 fst-italic p-2">Ajouter un nouveau RDV : </p>

        <form method="POST" class="col-lg-5 col-11" action="">

            <div class="d-flex flex-column">
                <label class="py-2">Date du RDV : <span class="text-danger"><?= isset($errors['RDVDate']) ? $errors['RDVDate'] : '' ?></span></label>
                <input type="date" id="RDVDate" min="<?= $today ?>" value="<?= isset($_POST['RDVDate']) ? $_POST['RDVDate'] : '' ?>" name="RDVDate">
            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Heure du RDV : <span class="text-danger"><?= isset($errors['RDVHour']) ? $errors['RDVHour'] : '' ?></span></label>
                <input type="time" id="RDVHour" min="08:00" max="18:00"value="<?= isset($_POST['RDVHour']) ? $_POST['RDVHour'] : '' ?>" name="RDVHour">

            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Description du RDV : <span class="text-danger"><?= isset($errors['RDVDescription']) ? $errors['RDVDescription'] : '' ?></span></label>
                <textarea type="text" id="RDVDescription" value="<?= isset($_POST['RDVDescription']) ? $_POST['RDVDescription'] : '' ?>" name="RDVDescription"></textarea>
            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Patient : <span class="text-danger"><?= isset($errors['patient']) ? $errors['patient'] : '' ?></label>

                <select id="patient" value="<?= isset($_POST['patient']) ? $_POST['patient'] : '' ?>" name="patient">
                    <option value="">Veuillez sélectionner un patient</option>

                    <?php foreach ($AllpatientArray as $value) { ?>
                        <option value="<?= $value['patients_id'] ?>"><?= $value['patients_lastname'] ?> <?= $value['patients_firstname'] ?></option>
                    <?php } ?>

                </select>
            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Docteur : <span class="text-danger"><?= isset($errors['doctor']) ? $errors['doctor'] : '' ?></label>

                <select id="doctor" value="<?= isset($_POST['doctor']) ? $_POST['doctor'] : '' ?>" name="doctor">
                    <option value="">Veuillez sélectionner un docteur</option>

                    <?php foreach ($allDoctorsArray as $value) { ?>
                        <option value="<?= $value['doctors_id'] ?>"><?= $value['doctors_name'] ?> <?= $value['doctors_lastname'] ?></option>
                    <?php } ?>

                </select>
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