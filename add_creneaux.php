<?php
session_start();

include_once "./views/inc/header.php";
require_once './models/permisModel.php';
require_once './models/userModel.php';
// pour message de connexion d'un moniteur
if (isset($_SESSION["success_message"])) {
    echo $_SESSION["success_message"];
    unset($_SESSION["success_message"]); // Supprimez le message après l'avoir affiché une fois
}
// 

if (isset($_SESSION["id_user"]) && $_SESSION["role_user"] !== "élève") {
    $listpermis = permis1::listPermis();
    $listuser = user1::listUser();
    ?>

    <div class="container">
        <form action="views/traitement/action.php" method="post">
            <div class="form-group">
                <label>Permis :</label>
                <select name="permis_id" class="form-control">
                    <option value="">Choisir un permis</option>
                    <?php
                    foreach ($listpermis as $permiz) { ?>
                        <option value="<?= $permiz['id_permis'] ?>"><?= $permiz['titre'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="meeting-time">Choisir une date et heure :</label>
                <input
                    type="datetime-local"
                    id="meeting-time"
                    name="date"
                    value="<?= date('Y-m-d\TH:i', strtotime('+1 hour')) ?>"
                    min="<?= date('Y-m-d\TH:i') ?>"
                    max="<?= date('Y-m-d\TH:i', strtotime('+1 year')) ?>"
                />
            </div>
            <input type="hidden" name="id_user" value="<?= $_SESSION["id_user"] ?>">
            <button type="submit" class="btn btn-primary mt-5 mb-5" name="choisir">Choisir</button>
        </form>
    </div>
<?php
} else {
    $_SESSION["message_acces"] = "Accès interdit aux élèves";
    header("Location: index.php");
}
?>
