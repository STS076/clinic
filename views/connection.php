<?php
session_start();
require_once '../controllers/controller-connection.php';
include('templates/header.php'); ?>

<main class="border border-secondary bg-danger">

    <p class="fs-4 text-center text-light m-3"> IDENTIFICATION </p>

    <form method="POST" action="">

        <div class="container rounded d-flex align-items-center flex-column  bg-white  mb-5 ">

            <div class=" form-group col-lg-6 col-12 my-3 text-center">
                <label class="text-dark">Identifiant</label>
                <input class="text-center form-control identify" placeholder="Identifiant" id="pseudo" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : '' ?>" name="pseudo">
                <p class="text-danger"><?= isset($errors['pseudo']) ? $errors['pseudo'] : '' ?></p>
            </div>

            <div class="form-group col-lg-6 col-12 my-3 text-center">
                <label class="text-dark">Mot de Passe:</label>
                <input type="password" class="identify text-center form-control" id="password" placeholder="Mot de Passe" name="password">
                <p class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></p>
            </div>

            <div class=" text-center">
                <button class="text-center text-center btn btn-danger" value="connect">Se connecter</button>
                <p class="text-danger" id="errorConnect"><?= isset($errors['connection']) ? $errors['connection'] : '' ?></p>
            </div>
            <div class="row text-center inscrit mt-3">
                <p class="text-decoration-underline ms-1">Mot de passe oublié</p>

            </div>

        </div>

    </form>

</main>


<?php include('templates/footer.php'); ?>