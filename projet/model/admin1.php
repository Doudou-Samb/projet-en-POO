<?php
require_once '../bdd/database.php';
global $connect;
 require_once '../model/user.php';
 
class Admin extends User{

 
 //methode ajouter etudiant

   
     public function ajouter_etudiant(){
        require_once '../bdd/database.php';
                 global $connect;
                 extract($_POST);


       
               
                if(!empty($nom) && !empty($prenom) && !empty($id) && !empty($numero_chambre) && !empty($batiment)){
                    //verifie  si le nom de l etudiant se trouve dans la base de donnees
                    $nomExist = $connect->prepare("SELECT nom FROM etudiant WHERE nom=?");
                    $nomExist->execute([$nom]);
                    $resultat =$nomExist->rowCount();
                    if($resultat==0){
                            echo 'ce nom n existe pas';
                    }


                    //verifie si le prenom de l etudiant se trouve dans la base de donnees
                        $prenomExist = $connect->prepare('SELECT prenom FROM etudiant WHERE prenom=?');
                        $prenomExist->execute(array($prenom));
                        $resultat2 =$prenomExist->rowCount();
                        if($resultat2==0){
                            echo 'ce prenom n existe pas';
                        }
                        
                    //verifie si l'identifiant se trouve dans la base de donnees
                            $idExist = $connect->prepare("SELECT id_etudiant FROM etudiant WHERE id_etudiant=?");
                            $idExist->execute([$id]);
                            $resultat3 =$idExist->rowCount();
                            if($resultat3!=0){
                                
                                //verifie s il existe un batiment
                                $batimentExist = $connect->prepare('SELECT nom_batiment,nom_batiment FROM batiment WHERE nom_batiment=? and numero_chambre=?');
                                $batimentExist->execute([$batiment,$numero_chambre]);
                                $result=$batimentExist->rowCount();
                                if($result==0){
                                    
                                    //ajouter un batiment
                                    $ajouter_batiment=$connect->prepare('INSERT INTO batiment(nom_batiment,numero_chambre)VALUES(?,?)');
                                    $ajouter_batiment->execute([$batiment,$numero_chambre]);
                                }
                                
                    //verifie si une chambre existe
                                $chambreExist = $connect->prepare('SELECT numero_chambre FROM chambre WHERE numero_chambre=?');
                                $chambreExist->execute([$numero_chambre]);
                                $resultat4 =$chambreExist->rowCount();
                                $resultat5 =$chambreExist->fetch();
                                
                                if($resultat4==0 || $resultat4!=0){
                                
                                    //verifie si la chambre n est pas pleine
                                    $etudiant_max=$connect->prepare('SELECT * FROM chambre where numero_chambre=? and nom_batiment=? ');
                                    $etudiant_max->execute([$numero_chambre ,$batiment]);
                                    $max=$etudiant_max->rowCount();
                                    if($max<5){
                                         // si elle n est pas pleine on cree une chambre
                                    $ajouter_chambre =$connect->prepare("INSERT INTO chambre(numero_chambre,id_etudiant,nom_batiment)VALUES(?,?,?)");
                                    $ajouter_chambre->execute([$numero_chambre,$id,$batiment]);

                                    header('Location:./ajout_reussie.php');
                                    }else{
                                        echo 'la chambre est pleine';
                                    }
                                    
                                    
                                   

                                    }
                                  
                                }else{
                                    echo 'cet identifiant n existe pas';
                                    }    
                                
                    

                 
                    
                    }else{
                        echo 'veuillez renseigner tous les champs';
                }
               
    }
            
//redefinition methode login admin

    public function login(){
        require_once '../bdd/database.php';
        global $connect;
            extract($_POST);
            if(!empty($id) && !empty($mdp)){
                $idExist = $connect->prepare('SELECT id FROM administrateur WHERE id=?');
                $idExist->execute([$id]);
                $resultat= $idExist->fetch();
                if($resultat==true){
                    $mdpExist = $connect->prepare('SELECT * FROM administrateur WHERE mdp=?');
                    $mdpExist->execute([$mdp]);
                    $resultat2= $mdpExist->fetch();
                    if($resultat2==true){
                       header('Location:./admin.php');
                       exit;

                    }else{
                        echo " mot de passe incorrecte";
                    }
                }else{
                    echo "l identifiant n existe pas";
                }
            }else{
                echo 'veuillez remplir tous les champs';
            }
    }

//methode qui affiche la liste des etudiants inscrit
    public function afficher_list(){
        require '../bdd/database.php';
		$requete = "SELECT nom,prenom,id_etudiant FROM etudiant";
		$resultat = $connect->query($requete)->fetchAll();
        $resultat2=$connect->query('SELECT * FROM chambre ');?>
        
        <table class="tab1">
        
                    <tr>
                        <td>Nom</td>
                        <td>prenom</td>
                        <td>Identifiant</td>
                    
                    </tr>
               
              
                <?php foreach ($resultat as $value){ ?>
          <tr>
          
            <td><?php echo $value['nom'];?> </td> 
           <td> <?php echo $value['prenom'];?></td> 
            <td><?php echo $value['id_etudiant'];?></td> <br>
          
                </tr>
               
         

            <?php }  ?>
        
            </table > 
                   
            <table class="tab2">

            <tr>
                    <td>Identifiant</td>
                    <td>Numero chambre</td>
                    <td>Nom batiment</td>


                    </tr>
                    <?php foreach ($resultat2 as $value2){ ?>
                    <tr>
                        <td><?php echo $value2['id_etudiant']  ?></td>
                        <td><?php echo$value2['numero_chambre'] ?></td>
                        <td><?php  echo $value2['nom_batiment']?></td>
                    </tr>
                    <?php } ?>




            </table>
            <?php
        
    }

//methode supprimer etudiant

    public function supp_etudiant(){
        
        
        require '../bdd/database.php';
        global $connect;
            extract($_POST);

            if(!empty($id) && !empty($numero_chambre) && !empty($batiment)){

                //on verifie si l idnetifiant existe
                $idExist=$connect->prepare('SELECT id_etudiant FROM chambre WHERE id_etudiant=?');
                $idExist->execute([$id]);
                $resultat1=$idExist->rowCount();
                if($resultat1!=0){
                    //on supprime L etudiant de la chambre
                    $supp_chambre=$connect->prepare('DELETE FROM chambre where id_etudiant=?');
                    $supp_chambre->execute([$id]);

                header('Location: ./supp_reussie.php');


                }else{
                    echo 'cet identifiant n a pas de chambre';
                }

                

            }else{
                echo 'veuillez renseigner tous les champs';
            }
    }

//methode modifier etudiant

    public function modif_etudiant(){
        require '../bdd/database.php';
        global $connect;
        extract($_POST);


        if(!empty($id) && !empty($batiment_act) && !empty($chambre_act) && !empty($batiment_dest) && !empty($chambre_dest)){

            //verifie si l etudiant exist dans la base de donnee

            $idExist=$connect->prepare('SELECT * FROM chambre WHERE id_etudiant=? and numero_chambre=? and nom_batiment=?');
            $idExist->execute([$id,$chambre_act,$batiment_act]);
            $resultat=$idExist->rowCount();
            if($resultat!=0){
                //verifie si la chambre de destination n est pas pleine
                $etudiant_max=$connect->prepare('SELECT * FROM chambre where numero_chambre=? and nom_batiment=? ');
                $etudiant_max->execute([$chambre_dest ,$batiment_dest]);
                $max=$etudiant_max->rowCount();
                if($max<5){
                // si ellle n est pas pleine on modifie 
                $modif=$connect->prepare('UPDATE chambre SET numero_chambre=?,nom_batiment=? WHERE id_etudiant=?');
                $modif->execute([$chambre_dest,$batiment_dest,$id]);


                //verifie s il existe un batiment
                $batimentExist = $connect->prepare('SELECT nom_batiment,nom_batiment FROM batiment WHERE nom_batiment=? and numero_chambre=?');
                $batimentExist->execute([$batiment_dest,$chambre_dest]);
                $result=$batimentExist->rowCount();
                if($result==0){
                    
                    //ajouter un batiment
                    $ajouter_batiment=$connect->prepare('INSERT INTO batiment(nom_batiment,numero_chambre)VALUES(?,?)');
                    $ajouter_batiment->execute([$batiment_dest,$chambre_dest]);
                }
                header('Location: ./modif_reussie.php');
                }else{
                    echo 'la chambre de destination est pleine';
                }
            }else{
                echo 'cet identifiant n existe pas';
            }


            }else{
            echo 'veuillez renseigner tous les champs';
            }
    }

//methode enregistrer admin

    public function enregistrer_admin(){

            require('../bdd/database.php');
            global $connect;
            extract($_POST);
            //verifier si l utilisateur a appuye sur s inscrire
   
        if(!empty($id) && !empty($nom) && !empty($prenom) && !empty($mdp) && !empty($email)){
                 //  verifie si l identidfiant existe dans la base de données
                 $idExist = $connect->prepare('SELECT id FROM administrateur where id = ? ');
                 $idExist -> execute([$id]);
                 if ($idExist->rowCount() == 0) {
                    //  verifie si l'utilisateur n'a pas entré l'email d'un admin
                    $adminExist = $connect->prepare('SELECT email FROM administrateur where email = ?');
                    $adminExist -> execute([$email]);
                    if($adminExist ->rowCount() == 0){
                              //  ajoute l'admin dans la base
                            $q = $connect->prepare('INSERT INTO administrateur(id,nom,prenom,mdp,email)VALUES(:id,:nom,:prenom,:mdp,:email)');
                            $q->execute([
                                'id' => $id,
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'mdp' => $mdp,
                                'email' => $email
        
                            ]); 
                            header('Location: ./enregistrer_reussie.php');
                       
                    }else{
                            $e = "Cette adrresse Email existe deja.";
                           echo $e; 
                    }
                }else{
                    $e = "Cet identifiant existe déja .";   
                    echo $e;
                }
            }else{
            $e = "Veuillez Remplir tous les champs .";
            echo $e;
            }
    }



}
                        
    
 









    



