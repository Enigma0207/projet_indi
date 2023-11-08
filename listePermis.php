<?php
include_once "./views/inc/header.php";
require_once './models/permisModel.php';
$listpermis = permis1::listPermis();
; ?>


   
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr class="table-active">
                    <th>titre</th>
                    <th>prix</th>
                    <th>description</th>
                    <th>photo</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($listpermis as $perm) { ?>
                       <tr>
                            <td><?= $perm['titre']; ?></td>
                            <td><?= $perm['prix']; ?></td>
                            <td><?= $perm['description']; ?></td>
                            <td><img src="./views/assets/img/<?= $perm['photo']; ?>" alt="" width="100"></td>
                        </tr>
            <?php } ?>
            </tbody>
        </table>
       
        