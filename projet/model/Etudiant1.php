<?php
     require_once '../bdd/database.php';
     global $connect;
    require_once 'user.php';


class Etudiant extends User{

    //redefinition methode login etudiant

    public function login_etudiant(){
        require_once '../bdd/database.php';
        global $connect;
        extract($_POST);

        if(!empty($id) && !empty($mdp)){

            $idExist = $connect->prepare('SELECT id_etudiant,mdp FROM etudiant WHERE id_etudiant=? and mdp=?');
            $idExist->execute([$id,$mdp]);
            $resultat= $idExist->rowCount();
                if($resultat!=0){

                    
                    header('Location: log_etudiant.php');
                    
                }else{
                    echo 'l identifiant ou le mot de passe n existe pas';
                }


            
            }else{
                echo 'veuillez remplir tous les champs';
            }
    }


// methode afficher chambre de l etudiant
    public function afficher_chambre(){

        require '../bdd/database.php';
        global $connect;
    
    
        if(isset($_POST['valider'])){
            extract($_POST);
            $exist=$connect->prepare('SELECT id_etudiant,mdp FROM etudiant where id_etudiant=? and mdp=?');
            $exist->execute([$id,$mdp]);
            if($exist->rowCount()!=0){
                $chambre=$connect->prepare('SELECT numero_chambre FROM chambre where id_etudiant=?');
                $chambre->execute([$id]);
                $res=$chambre->fetch();
    
                $batiment=$connect->prepare('SELECT nom_batiment FROM chambre where id_etudiant=?');
                $batiment->execute([$id]);
                $res2=$batiment->fetch();
            }else{
                echo 'Identifiant ou mot de passe incorrect';
            }
           ?>
              
              <div class="chambre"></div>
            <p class="text_chambre">Votre Chambre:</p>
            <p class="message1"><?php echo $res['numero_chambre']  ?></p>
        
            <div class="batiment"></div>
            <p class="text_batiment">Votre batiment:</p>
            <p class="message2"><?php  echo $res2['nom_batiment']?></p>
       
           
    
            <?php }?>
            <?php
    }

//methode inscription etudiant

public function inscription(){
      //ajout de la base de donnees
      require('../bdd/database.php');
      global $connect;
     
          extract($_POST);
          if(!empty($id) && !empty($nom) && !empty($prenom) && !empty($mdp) && !empty($email)){
                   //  verifie si l identidfiant existe dans la base de données
                   $idExist = $connect->prepare('SELECT id_etudiant FROM etudiant where id_etudiant = ? ');
                   $idExist -> execute([$id]);
                   if ($idExist->rowCount() == 0) {
                      //  verifie si l'utilisateur n'a pas entré l'email d'un admin
                      $adminExist = $connect->prepare('SELECT email FROM administrateur where email = ?');
                      $adminExist -> execute([$email]);
                      if($adminExist ->rowCount() == 0){
                          //  verife si l'email existe dans la base de données
                          $emailExist = $connect->prepare('SELECT email FROM etudiant where email = ?');
                          $emailExist -> execute([$email]);
                          if($emailExist ->rowCount() == 0){
                                //  ajoute l'etudiant dans la base
                              $q = $connect->prepare('INSERT INTO etudiant(id_etudiant,nom,prenom,mdp,email)VALUES(:id_etudiant,:nom,:prenom,:mdp,:email)');
                              $q->execute([
                                  'id_etudiant' => $id,
                                  'nom' => $nom,
                                  'prenom' => $prenom,
                                  'mdp' => $mdp,
                                  'email' => $email
          
                              ]); 
                              header('Location: inscription_reussie.php');
                          }else{
                              $e = "Cette adrresse Email existe deja.";
                             echo $e;
                          }
                      }else{
                          $e = "Cette adrresse Email existe deja.";
                          echo $e;
                      }
                  }else{
                      $e = "Cet identifiant est déja inscrit dans le site.";   
                      echo $e;
                  }
              }else{
              $e = "Veuillez Remplir tous les champs .";
              echo $e;
              }
      }
                          
      
    

}



  
