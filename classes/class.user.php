<?php

//création de la classe User
class User{


    private $bdd;
    
    // prise en compte de toute la base de données par le constructeur : toutes les méthodes auront accès à la base de données
    public function __construct($bdd){
        $this->bdd = $bdd; 
    }

    // permet de savoir si l'utilisateur est connecté. Si oui retourne TRUE.
    public function is_logged_in(){
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            return true;
        }        
    }

    // récupération du mot de passe et hachage
    public function create_hash($value)
    {
        return $hash = crypt($value, '$2a$12.substr(str_replace('+', '.', base64_encode(sha1(microtime(true), true))), 0, 22))');
    }

    // fonction privée pour vérifier que le mot de passe user saisi et $hash sont identiques
    private function verify_hash($user_Pass, $hash)
    {
        return $hash == crypt($user_Pass, $hash);
    }

    // fonction privée pour récupérer le mot de passe haché dans la base de données à partir du pseudo
    private function get_user_hash($user_Pseudo){    

        try {

            $reponse = $this->bdd->prepare('SELECT user_Pass FROM blog_user WHERE user_Pseudo = :user_Pseudo');
            $reponse->execute(array('user_Pseudo' => $user_Pseudo));
            
            $donnees = $reponse->fetch();
            return $donnees['user_Pass'];

        } catch(PDOException $e) {
            echo '<p class="error">'.$e->getMessage().'</p>';
        }
    }

    // vérifier que le mot de passe saisi et $hashed sont identiques (== 1)  
    public function login($user_Pseudo, $user_Pass){    

        $hashed = $this->get_user_hash($user_Pseudo);
        
        if($this->verify_hash($user_Pass, $hashed) == 1){
            
            $_SESSION['loggedin'] = true;
            return true;
        }        
    }
    
        
    public function logout(){
        session_destroy();
    }
    
}

