<?php
session_start();
require_once '../controllers/doctorsList-controller.php';

include('templates/header.php'); ?>


<main class="border border-secondary bg-danger p-5">


    <div class="row m-5 justify-content-center bg-white rounded p-5 my-2">
        <p class="fw-bold fs-4 fst-italic p-2 text-center">Gestion des spécialistes: </p>
        <div class="col-10">

            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Prénom</th>
                        <!-- <th class="text-center" >Spécialité</th> -->
                        <!-- <th class="text-center" >Email</th> -->
                        <th class="text-center">+ d'info</th>
                        <th class="text-center">Modification</th>
                        <th class="text-center">Suprpimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allDoctorsArray as $doctors) { ?>
                        <tr>
                            <th class="text-center"><?= $doctors['doctors_id'] ?></th>
                            <td class="text-center"><?= $doctors['doctors_lastname'] ?></td>
                            <td class="text-center"><?= $doctors['doctors_name'] ?></td>
                            <!-- <td class="text-center" ><?= $doctors['medicalspecialities_name'] ?></td> -->
                            <!-- <td class="text-center" ><?= $doctors['doctors_mail'] ?></td> -->
                            <td class="text-center"><a class="btn bg-warning" href="doctorsInfo.php?doctors=<?= $doctors['doctors_id'] ?>"> + d'info</a></td>
                            <td class="text-center"><a class="btn bg-warning" href="doctorsModify.php?doctors=<?= $doctors['doctors_id'] ?>">Modifier</a></td>
                            <td class="text-center"><a class="btn bg-warning" type="button" data-bs-toggle="modal" data-bs-target="#doctors-<?= $doctors['doctors_id'] ?>">Supprimer</a></td>
                        </tr>

                        <div class="modal fade" id="doctors-<?= $doctors['doctors_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title fs-4" id="exampleModalLabel"><?= $doctors['doctors_lastname'] ?> <?= $doctors['doctors_name'] ?></p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez vous supprimer le médecin ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <form action="" method="POST">
                                            <button class="btn btn-primary" name="delete" value="<?= $doctors['doctors_id'] ?> ">Supprimer</button>
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