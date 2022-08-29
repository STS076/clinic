<?php
session_start();
require_once '../controllers/addDoctors-controller.php';
include('templates/header.php'); ?>

<main class="border border-secondary bg-danger p-5">

    <div class="container rounded d-flex align-items-center flex-column  bg-white p-5">

        <p class="fw-bold fs-4 fst-italic p-2">Ajouter un nouveau spécialiste : </p>

        <form method="POST" class="col-lg-5 col-11" action="">

            <div class="d-flex flex-column">
                <label class="py-2">Prénom du spécialiste : <span class="text-danger"><?= isset($errors['doctorName']) ? $errors['doctorName'] : '' ?></span></label>
                <input type="text" id="doctorName" value="<?= isset($_POST['doctorName']) ? $_POST['doctorName'] : '' ?>" name="doctorName">
            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Nom du spécialiste : <span class="text-danger"><?= isset($errors['doctorSurname']) ? $errors['doctorSurname'] : '' ?></span></label>
                <input type="text" id="doctorSurname" value="<?= isset($_POST['doctorSurname']) ? $_POST['doctorSurname'] : '' ?>" name="doctorSurname">

            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Numéro de téléphone du spécialiste : <span class="text-danger"><?= isset($errors['doctorPhone']) ? $errors['doctorPhone'] : '' ?></span></label>
                <input type="text" id="doctorPhone" value="<?= isset($_POST['doctorPhone']) ? $_POST['doctorPhone'] : '' ?>" name="doctorPhone">
            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Email du spécialiste : <span class="text-danger"><?= isset($errors['doctorMail']) ? $errors['doctorMail'] : '' ?></label>
                <input type="text" id="doctorMail" value="<?= isset($_POST['doctorMail']) ? $_POST['doctorMail'] : '' ?>" name="doctorMail">
            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Spécialité médicale : <span class="text-danger"><?= isset($errors['doctorSpecialty']) ? $errors['doctorSpecialty'] : '' ?></label>
               
                <select id="doctorSpecialty" value="<?= isset($_POST['doctorSpecialty']) ? $_POST['doctorSpecialty'] : '' ?>" name="doctorSpecialty">
                    <option selected disabled>Veuillez sélectionner une spécialité</option>

                    <?php foreach( $allSpecialitiesArray as $value) { ?>
                        <option value="<?= $value['medicalspecialities_id'] ?>"><?= $value['medicalspecialities_name']?></option>
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