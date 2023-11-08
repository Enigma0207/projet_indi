<?php
session_start();
include_once "./views/inc/header.php";
require_once './models/userModel.php';
$listuser = user1::listUser();

// pour message de connexion d'un Admon
if (isset($_SESSION["success_message"])) {
    echo $_SESSION["success_message"];
    unset($_SESSION["success_message"]); // Supprimez le message après l'avoir affiché une fois
}
// 
// var_dump($_SESSION); ?>


   
    <div class="container">
        <table  class="table table-bordered">
            <thead>
                <tr>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>role</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($listuser as $user){?>
                          <tr>
                            <td><?= $user['firstname']; ?></td>
                            <td><?= $user['lastname']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td><?= $user['email']; ?></td>
                         </tr>
        <?php }?>
            </tbody>
        </table>
       
        
