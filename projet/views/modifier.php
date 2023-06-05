<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/modif.css">
    <title>Document</title>
</head>
<body>

    <div class="modif_chambre"></div>
    <p class="text_modif">Modifier de Chambre</p>
    <img src="../asset/img/utilisateur (1).png" class="user">
    <a href="admin.php">
    <div class="retour"></div>
    <p class="text_retour">Retour</p>
    <div class="elipse"></div>
    <img src="../asset/img/fleche-arriere.png" class="retour1">
    </a>
   
    <div class="fond_gris">
      
        <p class="text_identifiant">Identifiant :</p>
        <p class="text_chambre">Numero Chambre:</p>
        <p class="text_batiment">Non Batiment :</p>
        <p class="text_actuelle">Destination</p>
        <p class="text_dest">Actuelle</p>
        <form method="post">
      
            <input type="number" class="identifiant" name="id"><br><br>
            <input type="text" class="numero_batiment_actuelle" name="batiment_act"><br><br>
            <input type="number" class="numero_chambre_actuelle" name="chambre_act"><br><br>
            <input type="number" class="numero_chambre_dest" name="chambre_dest"><br><br>
            <input type="text" class="numero_batiment_dest" name="batiment_dest"><br><br>
          

           
            <input type="submit" class="valider" value="Modifier" name="valider">
             
            <p class="fleche1">=></p>
            <p class="fleche2">=></p>
            
            

    </div>
    
</form>

<?php 

require '../model/admin1.php';

if(isset($_POST['valider'])){
    extract($_POST);
    $admin_modif=new Admin;
    $admin_modif->modif_etudiant();
}


?>
    
</body>
</html>