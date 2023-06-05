<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/inscriptio.css">
    <title>Document</title>
</head>
<body>
    <div class="inscription"></div>
    <p class="text_inscription">Inscription</p>
    <img src="../asset/img/utilisateur (1).png" class="user">
    <a href="etudiant.php">
    <div class="retour"></div>
    <p class="text_retour">Retour</p>
    <div class="elipse"></div>
    <img src="../asset/img/fleche-arriere.png" class="retour1">
    </a>
   
    <div class="fond_gris">
        <p class="text_identifiant">Identifiant :</p>
        <p class="text_nom">Nom :</p>
        <p class="text_prenom">Prenom :</p>
        <p class="text_mdp">Mot de passe:</p>
        <p class="text_confirmer">Email :</p>
        <form method="post">
      
            <input type="number" class="identifiant" name="id" placeholder="votre identifiant"><br><br>
            <input type="text" class="nom" name="nom" placeholder="votre nom"><br><br>
            <input type="text" class="prenom" name="prenom" placeholder="votre prenom"><br><br>
            <input type="password" class="mot_de_passe" name="mdp" placeholder="votre mot de passe"><br><br>
            <input type="email" class="email"name="email" placeholder="votre email"><br><br><br><br>
            <input type="submit" class="valider" value="S'inscrire" name="valider"> 
            

   
    <?php
   require '../model/Etudiant1.php';
   if(isset($_POST['valider'])){
    $inscription_etudiant=new Etudiant;
    $inscription_etudiant->inscription();
   }
    


   ?>
    </div>
    




    </form>
    
</body>
</html>