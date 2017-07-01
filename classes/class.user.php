<?php

//création de la classe User
class User{


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
            global $bdd;

            $reponse = $bdd->prepare('SELECT user_Pass FROM blog_user WHERE user_Pseudo = :user_Pseudo');
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
    

    public function update_users_modif()
    {
        global $bdd;
        $user = new User($bdd); 
        

    // quand le formulaire est envoye :
        if(isset($_POST['submit'])){

            // collecter les données du formulaire
            extract($_POST);

            // validations
            if($user_Pseudo ==''){
                $error[] = "Merci d'entrer un pseudo";
            }

            if( strlen($user_Pass) > 0){

                if($user_Pass ==''){
                    $error[] = "Merci d'entrer un mot de passe";
                }

                if($user_PassConfirm ==''){
                    $error[] = "Merci de confirmer le mot de passe";
                }

                if($user_Pass != $user_PassConfirm){
                    $error[] = "Les mots de passe ne sont pas identiques";
                }
            }

            if($user_Email ==''){
                $error[] = "Merci d'entrer une adresse email";
            }

            if(!isset($error)){
                try {
                    if(isset($user_Pass)){

                        $hashed_user_Pass = $user->create_hash($user_Pass);

                        //maj base de donnees
                        $reponse = $bdd->prepare('UPDATE blog_user SET user_Pseudo = :user_Pseudo, user_Pass = :user_Pass, user_Email = :user_Email WHERE user_ID = :user_ID') ;
                        $reponse->execute(array(
                            ':user_Pseudo' => $user_Pseudo,
                            ':user_Pass' => $hashed_user_Pass,
                            ':user_Email' => $user_Email,
                            ':user_ID' => $user_ID
                        ));

                        $update_users = $reponse;

                        return $update_users;

                    } else {
                        //maj base de donnees
                        $reponse = $bdd->prepare('UPDATE blog_user SET user_Pseudo = :user_Pseudo, user_Email = :user_Email WHERE user_ID = :user_ID') ;
                        $reponse->execute(array(
                            ':user_Pseudo' => $user_Pseudo,
                            ':user_Email' => $user_Email,
                            ':user_ID' => $user_ID
                        ));

                        $update_users = $reponse;

                        return $update_users;

                    }

                } catch(PDOException $e) {
                    echo $e->getMessage();
                }

            }

        }
    }


    public function insert_users()
    {
        global $bdd;
        $user = new User($bdd); 

        // quand le formulaire est envoye :
        if(isset($_POST['submit'])){

            $_POST = array_map( 'stripslashes', $_POST );

            // collecter les donnees du formulaire
            extract($_POST);

            // validations
            if($user_Pseudo == ""){
                $error[] = "Merci d'entrer un pseudo";
            }

            if( strlen($user_Pass) >= 0){

                if($user_Pass == " "){
                    $error[] = "Merci d'entrer un mot de passe";
                }

                if($user_PassConfirm == ""){
                    $error[] = "Merci de confirmer le mot de passe";
                }

                if($user_Pass != $user_PassConfirm){
                    $error[] = "Les mots de passe ne sont pas identiques";
                }

            }

            // check if e-mail address is well-formed
            if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)){
                $error[] = "Merci d'entrer une adresse email valide";
            }

            if(!isset($error)){

                $hashed_user_Pass = $user->create_hash($user_Pass);

                try {

                    //insertion dans la base de donnees
                    $reponse = $bdd->prepare('INSERT INTO blog_user (user_Pseudo, user_Pass, user_Email) VALUES (:user_Pseudo, :user_Pass, :user_Email)') ;
                    $reponse->execute(array(
                        ':user_Pseudo' => $user_Pseudo,
                        ':user_Pass' => $hashed_user_Pass,
                        ':user_Email' => $user_Email
                    ));

                    $insert_user = $reponse;

                    return $insert_user;

                } catch(PDOException $e) {
                    echo $e->getMessage();
                }

            }

        }

    }

    public function get_users_modif()
    {
        global $bdd;
            
        $reponse = $bdd->prepare('SELECT user_ID, user_Pseudo, user_Email FROM blog_user WHERE user_ID = :user_ID');
        $reponse->execute(array(':user_ID' => $_GET['id']));
        $users_modif = $reponse->fetchAll();
        
        
        return $users_modif;
    }


    public function get_users()
    {
        global $bdd;
            
        $reponse = $bdd->prepare('SELECT user_ID, user_Pseudo, user_Email FROM blog_user ORDER BY user_ID ASC');
        $reponse->execute();
        $users_list = $reponse->fetchAll();
        
        
        return $users_list;
    }


    public function delete_users()
    {
        global $bdd;

        if(isset($_GET['deluser'])){ 

            if($_GET['deluser'] !='1'){

                $reponse = $bdd->prepare('DELETE FROM blog_user WHERE user_ID = :user_ID') ;
                $reponse->execute(array(':user_ID' => $_GET['deluser']));
                $delete_user = $reponse;

                return $delete_user;
            }
        } 
    }



}

