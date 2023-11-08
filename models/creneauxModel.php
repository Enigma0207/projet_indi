<?php
require_once "database.php";

class creneaux1{

    

    
    public static function add_creneaux($date, $idPermis, $idMoniteur)
  {
    $db = Database::dbConnect();

    $request = $db->prepare("INSERT INTO creneaux (date, id_moniteur, permis_id) VALUES (?, ?, ?)");
    try {
        $request->execute(array($date, $idMoniteur, $idPermis));

        header("Location: http://localhost/projet_indi/listeCreneaux.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
  }

    // public static function listCreneaux( )
  // {
  //   $db = Database::dbConnect();

  //   // Sélectionnez toutes les colonnes de la table "creneaux" pour un moniteur spécifique
  //   $request = $db->prepare("SELECT * FROM creneaux ");

  //   try {
  //       $request->execute();
  //       $listcreneaux = $request->fetchAll(PDO::FETCH_ASSOC);
  //       return $listcreneaux;
  //   } catch (PDOException $e) {
  //       echo $e->getMessage();
  //   }
  // }
     public static function listCreneaux()
       {
           $db = Database::dbConnect();
       
           // Sélectionnez les colonnes nécessaires en effectuant une jointure entre les tables creneaux, permis et user
           $request = $db->prepare("SELECT c.id_creneaux, c.date, p.titre, u.firstname, c.disponibilite FROM creneaux c
                                    LEFT JOIN permis p ON c.permis_id = p.id_permis
                                    LEFT JOIN user u ON c.id_moniteur = u.id_user");
           try {
               $request->execute();
               $listcreneaux = $request->fetchAll(PDO::FETCH_ASSOC);
               return $listcreneaux;
           } catch (PDOException $e) {
               echo $e->getMessage();
           }
       }
  
  
// update database

  public static function reserverCreneau($id_creneaux, $idEleve)
 {
    $db = Database::dbConnect();

    $request = $db->prepare("UPDATE creneaux SET id_eleve = ?, disponibilite = 'pris' WHERE id_creneaux = ?");
    try {
        $request->execute(array($idEleve, $id_creneaux));
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
  }
//pour annuler le creneau


   public static function annulerCreneau($id_creneaux, $idEleve)
      {
          $db = Database::dbConnect();
      
          // Vérifiez d'abord si le créneau est réservé par l'élève actuel
          $verifier = $db->prepare("SELECT id_eleve FROM creneaux WHERE id_creneaux = ? AND id_eleve = ?");
          $verifier->execute(array($id_creneaux, $idEleve));
          $row = $verifier->fetch(PDO::FETCH_ASSOC);
      
          if ($row && $row['id_eleve'] == $idEleve) {
              // Le créneau est réservé par l'élève actuel, nous pouvons l'annuler
      
              $annulationQuery = $db->prepare("UPDATE creneaux SET id_eleve = NULL, disponibilite = 'dispo' WHERE id_creneaux = ?");
              $annulationQuery->execute(array($id_creneaux));
      
              // Vous pouvez également effectuer d'autres actions ici, par exemple, envoyer un message de confirmation.
          } else {
              // Le créneau n'est pas réservé par l'élève actuel, vous pouvez gérer cette situation en conséquence, par exemple, afficher un message d'erreur.
          }
      }

  
}