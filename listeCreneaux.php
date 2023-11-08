<?php
session_start();
include_once "./views/inc/header.php";
require_once './models/creneauxModel.php';
// pour message de connexion
if (isset($_SESSION["success_message"])) {
    echo $_SESSION["success_message"];
    unset($_SESSION["success_message"]); // Supprimez le message après l'avoir affiché une fois
}
// 

if (isset($_SESSION["id_user"])) {
    $idMoniteur = $_SESSION["id_user"];
    $listcreneaux = creneaux1::listCreneaux($idMoniteur);
} ?>


    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id_creneaux</th>
                    <th>date</th>
                    <th>titre</th>
                    <th>firstname</th>
                    <th>disponibilite</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach ($listcreneaux as $creneau) { ?>
                        <tr class="bg-body-secondary <?= $creneau['disponibilite'] === 'pris' ? 'reserved' : ''; ?>">
                             <td><?= $creneau['id_creneaux']; ?></td>
                             <td><?= $creneau['date']; ?></td>
                             <td><?= $creneau['titre']; ?></td>
                             <td><?= $creneau['firstname']; ?></td>
                             <td><?= $creneau['disponibilite']; ?></td>
                            <td>
                                <?php if ($creneau['disponibilite'] === 'dispo') { ?>
                                    <a class="reserannu" href="reserver.php?id=<?= $creneau['id_creneaux']; ?>">Réserver</a>
                                    <a class="reserannu" href="annuler.php?id=<?= $creneau['id_creneaux']; ?>">Annuler</a>
                                <?php } elseif ($creneau['disponibilite'] === 'pris' && $creneau['id_eleve'] == $_SESSION["id_user"]) { ?>
                                    <a href="annuler.php?id=<?= $creneau['id_creneaux']; ?>">Annuler</a>
                                <?php } else { ?>
                                    <span>Réservé</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>

    
 
