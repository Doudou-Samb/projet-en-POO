<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/etudiant.css">
    <title>Document</title>
</head>
<body>
    
    <a href="page2.php">
    <div class="retour"></div>
    <div class="elipse"></div>
    <p class="text_retour">Retour</p>
    <img src="../asset/img/fleche-arriere.png" class="retour1">
    </a>
    <div class="fond_gris">
        <p class="text_id">Identifiant</p>
        <p class="text_mdp">Mot de passe</p>
    <form  method="post">
        <input type="text" class="identifiant" name="id" placeholder="votre identifiant"><br><br>
        
        <input type="password" class="mdp" name="mdp" placeholder="votre mot de passe"><br><br>
        <input type="submit" class="connexion" value="connexion" name="connexion" >
        </form>
        <div class="ligne1"></div>
        <div class="ligne2"></div>
        <p class="text">Ou</p>
        <a href="inscription.php">
        <div class="inscription" ></div>
        <p class="text_inscription">Inscription</p>
        <img src="../asset/img/utilisateur (1).png" class="utilisateur">
        </a>
      
   
        <?php  
        
        require '../model/Etudiant1.php';  
        if(isset($_POST['connexion'])){
        
            $etudiant_log=new Etudiant;
            $etudiant_log->login_etudiant();
        }
        
        
        
        
        ?>
  

     </div>
</body>
</html>