<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/log_etudian.css">
    <title>Document</title>
   

</head>
<body>
 
    <form method="post">
    <input type="text" name="id" class="id" placeholder="votre identifiant">
    <input type="text" name="mdp" class="mdp" placeholder="votre mot de passe">
    <input type="submit" name="valider" class="valider">
    <p class="text_id">Id et mot de passe:</p>
  <a href="etudiant.php">
   <div class="elipse"><img src="../asset/img/chevron-fleche-vers-le-bas.png" class="img"> </div>
   </a>
    </form>

     
        <?php 
        require_once '../model/Etudiant1.php';
        if(isset($_POST['valider'])){
            require '../bdd/database.php';
            global $connect;
        
        
            if(isset($_POST['valider'])){
                extract($_POST);
               $chambre_etudiant=new Etudiant;
               $chambre_etudiant->afficher_chambre();
            }
        }
    
   ?>

    


</body>
</html>