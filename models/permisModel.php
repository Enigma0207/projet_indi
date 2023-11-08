<?php
require_once "database.php";

// 1actor.creation de la classe actor pour add-actor
class permis1
{

  // ajoueter les acteur
  public static function add_permis( $titre,$prix,$description,$img_name)
  {
    $db = Database::dbConnect();

    $request = $db->prepare("INSERT INTO permis ( titre,prix,description,photo) VALUES (?,?,?,?)");
    try {
      $request->execute(array( $titre,$prix,$description,$img_name));
       header("Location: http://localhost/projet_indi/add_permis.php");
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

  }
  public static function listPermis()
  {
    //   se connecter
    $db = Database::dbConnect();
    $request = $db->prepare("SELECT * FROM permis");
    //   ECXECUTER
    try {
      $request->execute();
      // recuperer les tablresultateau de la request dans un tableau
      $listpermis = $request->fetchALL();
      //   return $listBook qui stock les valeur du tableau cad les livre et sera utiliser pour afficher les livres quand on fera apple a la fonction listBook() dans listBook
      return $listpermis;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }


  }

}