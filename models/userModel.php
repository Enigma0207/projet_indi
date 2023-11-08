
<?php
require_once "database.php";

// 1actor.creation de la classe actor pour add-actor
class user1{

    // fonction s'inscrire
  public static function add_user($firstname, $lastname,$email,$password, $phone){
       $db = Database::dbConnect();

    $request = $db->prepare("INSERT INTO user (firstname,lastname, email,password,phone) VALUES (?,?,?,?,?)");
    try {
          $request->execute(array($firstname, $lastname,$email,$password, $phone ));
         header("Location: http://localhost/projet_indi/login.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

  }
        // methode staticpublic static function se connecter

 public static function connexion($email,$password){


     //  connection à la bdd ::pck c'est une class qui encapsul la bdd
     $db= Database::dbConnect();
     //  prepare la request
     $request = $db->prepare("SELECT * FROM user WHERE email =?");
          // execuet  request
     try
     {
             $request->execute(array($email));
            // recupere le resultat de la request dans un tableau
             $user = $request->fetch();
             
            // verifier si le mot de passe est correct
             if(empty( $user)){
              // si on ne reconnais pas l'email de connexion
               $_SESSION["error"] = "user inconnu"; //  rediriger vers login.php
           header("Location: http://localhost/projet_indi/login.php");
   
            }else if(password_verify($password, $user["password"])){  
              $_SESSION["role_user"] = $user["role"];
              $_SESSION["id_user"] = $user["id_user"];
              
              
      
              // Redirection en fonction du rôle de celui qui se connecte
              if ($_SESSION["role_user"] == "admin") {
                header("Location: http://localhost/projet_indi/add_permis.php");
                   $_SESSION["success_message"] = "Bienvenue cher Admin!";

                } else if ($_SESSION["role_user"] == "élève") {
                header("Location: http://localhost/projet_indi/listeCreneaux.php ");
                 $_SESSION["success_message"] = "Bienvenue cher Elève!";
                
   
               } else if ($_SESSION["role_user"] == "moniteur") {
                header("Location:http://localhost/projet_indi/add_creneaux.php ");
                $_SESSION["success_message"] = "Bienvenue cher Moniteur!";

               } 
           }else {
                $_SESSION["erreur_message"] = "mot de passe incorrect";
                //  rediriger vers login.php
                header("Location: ./login.php");
   
           }
               return $user;
        
      } catch (PDOException $e) 
        {
            echo $e->getMessage();
       }

  }

     public static function listUser(){
    //   se connecter
           $db = Database::dbConnect();
          $request = $db->prepare("SELECT * FROM user");
        //   ECXECUTER
          try {
          $request->execute();
          // recuperer les tablresultateau de la request dans un tableau
          $listuser = $request->fetchALL();
        //   return $listuser qui stock les valeur du tableau cad les utilisateurs 
          return  $listuser ;
        } catch (PDOException $e) {
        echo $e->getMessage();
    }


  }   

}