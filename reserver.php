<?php
session_start();
require_once './models/creneauxModel.php';

if (isset($_SESSION["id_user"]) && isset($_GET["id"])) {
    $id_creneaux = $_GET["id"];
    $idEleve = $_SESSION["id_user"];

    // Effectuez ici la réservation du créneau en utilisant creneauxModel
    creneaux1::reserverCreneau($id_creneaux, $idEleve);

    // Redirigez l'utilisateur vers la page de liste des créneaux après la réservation
    header("Location: listecreneaux.php");
} else {
    // Gérez le cas où l'utilisateur n'est pas connecté ou l'ID de créneau n'est pas défini
    // Redirigez l'utilisateur ou affichez un message d'erreur
}
