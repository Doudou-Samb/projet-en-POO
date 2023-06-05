<?php
 require_once '../model/iGestion.php';
class User implements iGestion{

    protected $nom;
    protected $prenom;
    protected $mdp;
    protected $email;
    protected $id_etudiant;
    protected $profil;
    protected $id;

    //Getter
    public function getID(){
        return $this->id;
    }

    public function getNom(){
    return $this->nom;

    }

    public function getPrenom(){
        return $this->prenom;
    
    }

    public function getEmail(){
        return $this->email;
        
    }
    public function getMdp(){
        return $this->mdp;
            
    }
    public function getId_etudiant(){
        return $this->id_etudiant;
    
        }

    public function getProfil(){
        return $this->profil;
    }

    //Setter

    public function setId($id){
        return $this->id=$id;
    }

    public function setNom($nom){
        return $this->nom=$nom;
    }

    public function setPrenom($prenom){
        return $this->prennom=$prenom;
    }  
            
        
    public function setEmail($email){
        return $this->email=$email;
    } 


    public function setMdp($mdp){
        return $this->mdp=$mdp;
    }
    
    public function setId_etudiant($id_etudiant){
        return $this->id_etudiant=$id_etudiant;
    } 

    public function setProfil($profil){
        return $this->profil=$profil;
    }
//methode login admin

    public function login(){
        
        if(!empty($id) && !empty($mdp)){
            $idExist = $connect->prepare('SELECT id FROM administrateur WHERE id=:id');
            $idExist->execute([$id]);
            $resultat= $idExist->fetch();
            if($resultat==true){
                $mdpExist = $connect->prepare('SELECT * FROM administrateur WHERE mdp=:mdp');
                $mdpExist->execute([$mdp]);
                $resultat2= $mdpExist->fetch();
                if($resultat2==true){
                   header("Location: admin.php");
                }else{
                    echo "l identifiant ou le mot de passe n'existe pas";
                }
            }else{
                echo "l identifiant ou le mot de passe n'existe pas";
            }
        }else{
            echo 'veuillez remplir tous les champs';
        }
}

}




