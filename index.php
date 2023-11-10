<?php

include_once "./views/inc/header.php";
require_once './models/permisModel.php';
$listpermis = permis1::listPermis();
?>

<div id="generale">
    <?php foreach ($listpermis as $course): ?>
        <section>
            <div class="image"><img src="./views/assets/img/<?= $course['photo']; ?>" alt=""></div>
            <div class="autre">
                <h3><?= $course['titre']; ?></h3>
                <p><?= $course['description']; ?></p>
                <p> Formule: <?= $course['prix']; ?>€</p>
                <a class="ici" href="add_user.php">vas-y</a>
            </div>
        </section>
        <hr>
    <?php endforeach; ?>
</div>

<?php include_once "./views/inc/footer.php"; ?>
