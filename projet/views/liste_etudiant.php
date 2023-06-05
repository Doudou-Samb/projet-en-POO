<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/liste_etudiant.css">
    <title>Document</title>
</head>
<body>
    
<div class="elipse"></div>
    <a href="admin.php">
    <div class="retour"></div>
    <p class="text_retour"> Retour</p>
    <div class="elipse2"></div>
    <img src="../asset/img/fleche-arriere.png" class="retour2">
    </a>
<div class="fond_gris">


  
  
 
    <h1>Liste des etudiants</h1>
	<?php
		require '../model/admin1.php';
        $admin_list=new Admin;
        $admin_list->afficher_list();

       ?>
        


   
</div>
</body>
</html>