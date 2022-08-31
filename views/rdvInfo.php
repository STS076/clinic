<?php
session_start();

require_once '../controllers/rdvInfo-controller.php';
include('templates/header.php'); ?>


<main class="border border-secondary bg-danger p-5">

    <div class="container rounded d-flex align-items-center flex-column  bg-white   ">
        <div class="row m-5">
            <div class="col-12 m-5">
                <p class="fst-italic fw-bold fs-4 text-center">Patient : <?= $SpecificAppointment[0]['patients_firstname'] ?> <?= $SpecificAppointment[0]['patients_lastname'] ?></p>
                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Date du RDV</th>
                            <th class="text-center">Heure de RDV</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Médecin</th>
                            <th class="text-center">Spécialité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center mx-5 px-5"><?= $SpecificAppointment[0]['rendezvous_date'] ?></td>
                            <td class="text-center mx-5 px-5"><?= $SpecificAppointment[0]['rendezvous_hour'] ?></td>
                            <td class="text-center mx-5 px-5"><?= $SpecificAppointment[0]['rendezvous_description'] ?></td>
                            <td class="text-center mx-5 px-5"><?= $SpecificAppointment[0]['doctors_name'] ?> <?= $SpecificAppointment[0]['doctors_lastname'] ?></td>
                            <td class="text-center mx-5 px-5"><?= $SpecificAppointment[0]['medicalspecialities_name'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center py-2 mb-5">
            <a href="rdvList.php"> <button class="btn btn-info text-white" type="submit" value="connect">retour</button></a>

        </div>
    </div>


</main>


<?php include('templates/footer.php'); ?>