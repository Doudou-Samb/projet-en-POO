<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/supprim.css">
    <title>Document</title>
</head>
<body>
    <div class="supp_chambre"></div>
    <p class="text_ajout">Supprimer</p>
    <img src="../asset/img/utilisateur (1).png" class="user">
    <a href="admin.php">
    <div class="retour"></div>
    <p class="text_retour">Retour</p>
    <div class="elipse"></div>
    <img src="../asset/img/fleche-arriere.png" class="retour1">
    </a>
   
    <div class="fond_gris">
        <p class="text_id">Identifiant:</p>
        <p class="text_batiment">Nom batiment :</p>
        <p class="text_chambre">Numero chambre :</p>
        <form method="post">
            <input type="text" class="id" name="id">
            <input type="number" class="numero_chambre" name="numero_chambre"><br><br>
            <input type="text" class="batiment" name="batiment"><br><br>

            <input type="submit" class="valider" value="valider" name="valider">
            </form>

    </div>
    
<?php 
require '../model/admin1.php';


if(isset($_POST['valider'])){
    $admin_supp=new Admin;
    $admin_supp->supp_etudiant();
}



?>



  
    
</body>
</html>