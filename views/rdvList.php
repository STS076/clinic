<?php
session_start();
require_once '../controllers/RDVList-controller.php';

include('templates/header.php'); ?>


<main class="border border-secondary bg-danger p-5">


    <div class="row m-5 justify-content-center bg-white rounded p-5 my-2">
        <p class="fw-bold fs-4 fst-italic p-2 text-center">Gestion des RDV: </p>
        <div class="col-10">

            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th class="text-center" >#</th>
                        <th class="text-center" >Date</th>
                        <th class="text-center" >Heure</th>
                        <th class="text-center" >Description</th>
                        <th class="text-center" >Patient</th>
                        <th class="text-center" >Docteur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($AllAppointmentArray as $value){ ?>
                    <tr>
                        <th class="text-center" ><?= $value['rendezvous_id']?></th>
                        <td class="text-center" ><?= $value['rendezvous_date']?></td>
                        <td class="text-center" ><?= $value['rendezvous_hour']?></td>
                        <td class="text-center" ><?= $value['rendezvous_description']?></td>
                        <td class="text-center" ><?= $value['patients_firstname']?> <?= $value['patients_lastname']?></td>
                        <td class="text-center" ><?= $value['doctors_name']?> <?= $value['doctors_lastname']?></td>
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