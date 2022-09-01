<?php
session_start();
require_once '../controllers/doctorModify-controller.php'; 
include('templates/header.php'); ?>

<main class="border border-secondary bg-danger p-5">

    <div class="container rounded d-flex align-items-center flex-column  bg-white p-5">

        <p class="fw-bold fs-4 fst-italic p-2">Ajouter un nouveau spécialiste : </p>

        <form method="POST" class="col-lg-5 col-11" action="">

            <div class="d-flex flex-column">
                <label class="py-2">Prénom du spécialiste : <span class="text-danger"><?= isset($errors['doctorName']) ? $errors['doctorName'] : '' ?></span></label>
                <input type="text" id="doctorName" value="<?= $SpecificDoctors[0]['doctors_name'] ?>" name="doctorName">
            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Nom du spécialiste : <span class="text-danger"><?= isset($errors['doctorSurname']) ? $errors['doctorSurname'] : '' ?></span></label>
                <input type="text" id="doctorSurname" value="<?= $SpecificDoctors[0]['doctors_lastname'] ?>" name="doctorSurname">

            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Numéro de téléphone du spécialiste : <span class="text-danger"><?= isset($errors['doctorPhone']) ? $errors['doctorPhone'] : '' ?></span></label>
                <input type="text" id="doctorPhone" value="<?= $SpecificDoctors[0]['doctors_phonenumber'] ?>" name="doctorPhone">
            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Email du spécialiste : <span class="text-danger"><?= isset($errors['doctorMail']) ? $errors['doctorMail'] : '' ?></label>
                <input type="text" id="doctorMail" value="<?= $SpecificDoctors[0]['doctors_mail'] ?>" name="doctorMail">
            </div>
            <div class="d-flex flex-column">
                <label class="py-2">Spécialité médicale : <span class="text-danger"><?= isset($errors['doctorSpecialty']) ? $errors['doctorSpecialty'] : '' ?></label>
               
                <select id="doctorSpecialty" value="<?= isset($_POST['doctorSpecialty']) ? $_POST['doctorSpecialty'] : '' ?>" name="doctorSpecialty">
                    <option value="">Veuillez sélectionner une spécialité</option>

                    <?php foreach( $allSpecialitiesArray as $value) { ?>
                        <option value="<?= $value['medicalspecialities_id'] ?>"><?= $value['medicalspecialities_name']?></option>
                        <?php } ?> 

                </select>
            </div>
            <!-- <div class="d-flex flex-column">
                <label class="py-2">MDP : <span class="text-danger"><?= isset($errors['doctorPassword']) ? $errors['doctorPassword'] : '' ?></label>
                <input type="password" id="doctorPassword" value="<?= isset($_POST['doctorPassword']) ? $_POST['doctorPassword'] : '' ?>" name="doctorPassword">
            </div> -->

            <div class="text-center pt-5">
                <button class="btn btn-danger" value="connect">Modifier</button>
            </div>

        </form>

        <div class="text-center pt-5">
            <a href="doctorsList.php"> <button class="btn btn-info text-white" value="connect">retour</button></a>

        </div>
    </div>


</main>


<?php include('templates/footer.php'); ?>