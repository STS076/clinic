<?php
session_start();
require_once '../controllers/patientList-controller.php';

include('templates/header.php'); ?>


<main class="border border-secondary bg-danger p-5">


    <div class="row m-5 justify-content-center bg-white rounded p-5 my-2">
        <p class="fw-bold fs-4 fst-italic p-2 text-center">Gestion des patients: </p>
        <div class="col-10">

            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Prénom</th>
                        <!-- <th class="text-center" >Courriel</th> -->
                        <th class="text-center">Action</th>
                        <th class="text-center">Modifier</th>
                        <th class="text-center">Suprpimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($AllpatientArray as $patient) { ?>

                        <tr>
                            <th class="text-center" name="patients_id"><?= $patient['patients_id'] ?></th>
                            <td class="text-center"><?= $patient['patients_lastname'] ?></td>
                            <td class="text-center"><?= $patient['patients_firstname'] ?></td>
                            <!-- <td class="text-center" ><?= $patient['patients_mail'] ?></td> -->
                            <td class="text-center"><a class="btn bg-warning" href="patientInfo.php?patient=<?= $patient['patients_id'] ?>"> + d'info</a></td>
                            <td class="text-center"><a class="btn bg-warning" href="patientModify.php?patient=<?= $patient['patients_id'] ?>">Modifier</a></td>

                            <td class="text-center"><a class="btn bg-warning" type="button" data-bs-toggle="modal" data-bs-target="#patient-<?= $patient['patients_id'] ?>">Supprimer</a></td>

                        </tr>

                        <div class="modal fade" id="patient-<?= $patient['patients_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title fs-4" id="exampleModalLabel"><?= $patient['patients_lastname'] ?> <?= $patient['patients_firstname'] ?></p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez vous supprimer le patient ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <form action="" method="POST">
                                            <button class="btn btn-primary" name="delete" value="<?= $patient['patients_id'] ?>">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="text-center pt-5 mb-5">
            <a href="dashboard.php"> <button class="btn btn-info text-white" type="submit" value="connect">retour</button></a>
        </div>
    </div>




</main>


<?php include('templates/footer.php'); ?>