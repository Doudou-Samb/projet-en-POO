<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/connexion_admin.css">
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
    <form action="" method="post">
        <input type="text" class="identifiant" name="id" placeholder="votre identifiant"><br><br>
        
        <input type="password" class="mdp" name="mdp" placeholder="votre mot de passe"><br><br>
        <input type="submit" class="connexion" value="connexion" name="connexion" >
        </form>
        <div class="ligne1"></div>
  
    </div>
    <?php 
    
     require_once '../model/admin1.php';
    
      //si l utilisateur appuie sur connexion on cree un objet puis on appel la methode login  
      
      if(isset($_POST['connexion'])){
        extract($_POST);
       
        $admin= new Admin();
        $admin->login();
 }
 

    
    ?>
     
</body>
</html>