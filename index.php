<?php
session_start();
require_once "./views/inc/header.php";


if(isset($_SESSION["message_acces"])) {

    echo "<div class='bg-warning'>".$_SESSION["message_acces"]."</div>";
    unset($_SESSION["message_acces"]);
}

?>
<div id="generale">

    <section class="">
        <div class="image"><img src="./views/assets/img/voiture1.jpg" alt=""></div>
        <div class="autre">
            <h3>PERMIS B</h3>
            <p>
                Avec le permis B, vous allez rouler en toute sécurité , nos moniteurs assurent votre fonctionnement à votre rythme.
                Une formation de qualité juste pour vous
            </p>
            <p> Formule 650£</p>
            <a href="">valider</a>
        </div>
    </section>
    <hr>
    <section>
        <div class="image"><img src="./views/assets/img/moto.jpg" alt=""></div>
        <div class="autre">
            <h3>PERMIS MOTO</h3>
            <p>
                Avec le permis mot, nous vous assurons que vous serez plus que des pilotes de formule 1, vous pouvez même voler si vous le souhaitez
            </p>
            <p> Formule 500£</p>
            <a href="">valider</a>
        </div>
    </section>
    <hr>
    <section>
        <div class="image"><img src="./views/assets/img/camion2.jpg" alt=""></div>
        <div class="autre">
            <h3>PERMIS CAMION</h3>
            <p>
                Avec le permis camion, les jeunes élèves peuvent facilement d’adapter à tout type de véhicule et cela dans toute la région de la france
            </p>
            <p> Formule 1500£</p>
            <a href="">valider</a>
        </div>
    </section>
</div>
<div>

</div>






<?php include_once "./views/inc/footer.php"; ?>