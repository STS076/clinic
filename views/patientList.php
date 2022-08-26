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
                        <th class="text-center" >#</th>
                        <th class="text-center" >Nom</th>
                        <th class="text-center" >Prénom</th>
                        <th class="text-center" >Courriel</th>
                        <th class="text-center" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($AllpatientArray as $patient){ ?>
                    <tr>
                        <th class="text-center" ><?= $patient['patients_id']?></th>
                        <td class="text-center" ><?= $patient['patients_lastname']?></td>
                        <td class="text-center" ><?= $patient['patients_firstname']?></td>
                        <td class="text-center" ><?= $patient['patients_mail']?></td>
                        <td class="text-center" ><a class="btn bg-warning" href="<?= $patient['patients_id']?>"> + d'info</a></td>
                    </tr>
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