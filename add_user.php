<?php
include_once "./views/inc/header.php";
?>

<div class="container">

   <form action="views/traitement/action.php" method="post">
         
         <div class="form-group">
           <label for="firstname"> firstname:</label>
           <input type="text" class="form-control" id="firstname" name="firstname" >
         </div>
         <div class="form-group">
           <label for="lastname"> lastname:</label>
           <input type="text" class="form-control" id="lastname" name="lastname" >
         </div>
         <div class="form-group">
           <label for="phone"> phone:</label>
           <input type="number" class="form-control" id="number" name="phone" >
         </div>
         
         
         <div class="form-group">
           <label for="password">password :</label>
           <input type="text" class="form-control" id="password" name="password" >
         </div>
         
         <div class="form-group">
           <label for="email">email :</label>
           <input type="email" class="form-control" id="email" name="email" >
         </div>
         
         <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="submit" value="submit">Submit</button>
   </form>




















