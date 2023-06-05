<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/enregistrer_admin.css">
    <title>Document</title>
</head>
<body>
<div class="ajout_chambre"></div>
    <p class="text_ajout">Enregistrer admin</p>
    <img src="../asset/img/utilisateur (1).png" class="user">
    <a href="connexion_admin.php">
    <div class="retour"></div>
    <p class="text_retour">Retour</p>
    <div class="elipse"></div>
    <img src="../asset/img/fleche-arriere.png" class="retour1">
    </a>
   
    <div class="fond_gris">

        <p class="text_identifiant">Identifiant :</p>
        <p class="text_nom">Nom :</p>
        <p class="text_prenom">Prenom :</p>
        <p class="text_chambre">Email :</p>
        <p class="text_batiment"> Mot de passe :</p>
        <form method="post">
      
            <input type="number" class="identifiant" name="id"><br><br>
            <input type="text" class="nom" name="nom"><br><br>
            <input type="text" class="prenom" name="prenom"><br><br>
            <input type="email" class="email" name="email"><br><br>
            <input type="text" class="mdp" name="mdp">     
            <input type="submit" class="valider" value="Ajouter" name="valider">
        

    </div>
    


    </form>
    <?php 
    
    
    require '../model/admin1.php';
    if(isset($_POST['valider'])){
       
        $admin_enregistrer=new Admin;
        $admin_enregistrer->enregistrer_admin();
    }
    
    
    
    
    ?>
</body>
</html>
