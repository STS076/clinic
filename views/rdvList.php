<?php


session_start();
require_once '../controllers/RDVList-controller.php';
include('templates/header.php'); ?>


<main class="border border-secondary bg-danger p-5">

    <div class="row m-5 justify-content-center bg-white rounded p-5 my-2">

    <!-- Titre de bienvenue -->
        <?php if ($_SESSION['user']['role_id_role'] == 3 && count($SpecificAppointmentArray) != 0 ) { ?>
            <p class="fw-bold fs-4 fst-italic p-2 text-center">Gestion des RDV du docteur <?= $SpecificAppointmentArray[0]['doctors_name'] ?> <?= $SpecificAppointmentArray[0]['doctors_lastname'] ?></p>
        <?php } else { ?>
            <p class="fw-bold fs-4 fst-italic p-2 text-center">Gestion des RDV </p>
        <?php  } ?>

        <div class="col-10">

        <!-- si le session user est un médecin alors affiche les RDV -->
            <?php
            if ($_SESSION['user']['role_id_role'] == 3) {
                if (count($SpecificAppointmentArray) == 0) { ?>
                    <p class="text-center fs-4">Il n'y a pas de RDV pour ce praticient</p>

                    <?php } else {
                    foreach ($SpecificAppointmentArray as $value) { ?>
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Heure</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Patient</th>
                                    <!-- <th class="text-center">Docteur</th> -->
                                    <th class="text-center">Spécialité</th>
                                    <th class="text-center">+ d'info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-center"><?= $value['rendezvous_id'] ?></th>
                                    <td class="text-center"><?= $value['rendezvous_date'] ?></td>
                                    <td class="text-center"><?= $value['rendezvous_hour'] ?></td>
                                    <td class="text-center"><?= $value['rendezvous_description'] ?></td>
                                    <td class="text-center"><?= $value['patients_firstname'] ?> <?= $value['patients_lastname'] ?></td>
                                    <!-- <td class="text-center"><?= $value['doctors_name'] ?> <?= $value['doctors_lastname'] ?></td> -->
                                    <td class="text-center"><?= $value['medicalspecialities_name'] ?></td>
                                    <td class="text-center"><a class="btn bg-warning" href="<?= $value['rendezvous_id'] ?>"> + d'info</a></td>
                                </tr>
                        <?php }
                }
            } else {
                // sinon affiche tous les RDV
                        ?>
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Heure</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Patient</th>
                                    <!-- <th class="text-center">Docteur</th> -->
                                    <th class="text-center">Spécialité</th>
                                    <th class="text-center">+ d'info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($AllAppointmentArray as $value) { ?>
                                    <tr>
                                        <th class="text-center"><?= $value['rendezvous_id'] ?></th>
                                        <td class="text-center"><?= $value['rendezvous_date'] ?></td>
                                        <td class="text-center"><?= $value['rendezvous_hour'] ?></td>
                                        <td class="text-center"><?= $value['rendezvous_description'] ?></td>
                                        <td class="text-center"><?= $value['patients_firstname'] ?> <?= $value['patients_lastname'] ?></td>
                                        <!-- <td class="text-center"><?= $value['doctors_name'] ?> <?= $value['doctors_lastname'] ?></td> -->
                                        <td class="text-center"><?= $value['medicalspecialities_name'] ?></td>
                                        <td class="text-center"><a class="btn bg-warning" href="<?= $value['rendezvous_id'] ?>"> + d'info</a></td>
                                    </tr>
                            <?php }
                            }
                            ?>
                            </tbody>
                        </table>
        </div>

        <?php if ($_SESSION['user']['role_id_role'] == 2) { ?>

            <div class="text-center pt-5 mb-5">
                <a href="dashboard.php"> <button class="btn btn-info text-white" type="submit" value="connect">retour</button></a>

            </div>

        <?php  } ?>
        <div class="text-center py-3">
            <a class="text-decoration-none" href="logout.php">
                <button class="btn text-white bg-info"> DECONNEXION</button>
            </a>
        </div>
    </div>


</main>


<?php include('templates/footer.php'); ?>