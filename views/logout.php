<?php
session_start();
require_once '../controllers/logout-controller.php';

include('templates/header.php'); ?>


<main class="border border-secondary bg-danger p-5">

    <div class="container rounded d-flex align-items-center flex-column  bg-white   ">
        <div class="row m-5">
            <div class="col m-5">
                <p>Vous avez bien été déconnecté de votre compte.</p>
            </div>
        </div>

    </div>


</main>


<?php include('templates/footer.php'); ?>