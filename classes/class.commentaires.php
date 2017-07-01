<?php

//création de la classe Commentaires
class Commentaires{


    private $_commentaire_ID;
  	private $_commentaire_Niveau;
  	private $_commentaire_ID_chapitre;
  	private $_commentaire_Nom;
  	private $_commentaire_Message;
  	private $_commentaire_Date;

    // GETTERS //

    public function commentaire_ID(){
      return $this->commentaire_ID;
    }
    public function commentaire_Niveau(){
      return $this->commentaire_Niveau;
    }
    public function commentaire_ID_chapitre(){
      return $this->commentaire_ID_chapitre;
    }
    public function commentaire_Nom(){
      return $this->commentaire_Nom;
    }
    public function commentaire_Message(){
      return $this->commentaire_Message;
    }
    public function commentaire_Date(){
      return $this->commentaire_Date;
    }


    // SETTERS //
  
    public function setCommentaire_ID($_commentaire_ID){
    	$this->commentaire_ID = (int) $_commentaire_ID;
    }
    public function setCommentaire_Niveau($_commentaire_Niveau){
    	$this->commentaire_Niveau = $_commentaire_Niveau;
    }
    public function setCommentaire_ID_chapitre($_commentaire_ID_chapitre){
		$this->commentaire_ID_chapitre = (int) $_commentaire_ID_chapitre;
    }
    public function setCommentaire_Nom($_commentaire_Nom){
		$this->commentaire_Nom = $_commentaire_Nom;
    }
    public function setCommentaire_Message($_commentaire_Message){
		$this->commentaire_Message = $_commentaire_Message;
    }
    public function setCommentaire_Date($_commentaire_Date){
		$this->commentaire_Date = $_commentaire_Date;
    }



    public function get_commentaires($offset, $limit)
    {
        global $bdd;
        $offset = (int) $offset;
        $limit = (int) $limit;
            
        $reponse = $bdd->prepare('SELECT commentaire_Message, commentaire_ID_chapitre, DATE_FORMAT(commentaire_Date, \'%d/%m/%Y\') AS commentaire_Date_fr FROM blog_commentaire ORDER BY commentaire_Date DESC LIMIT :offset, :limit');
        $reponse->bindParam(':offset', $offset, PDO::PARAM_INT);
        $reponse->bindParam(':limit', $limit, PDO::PARAM_INT);
        $reponse->execute();
        $commentaires = $reponse->fetchAll();
        
        
        return $commentaires;
    }
    

    public function get_commentaires_blogdetails()
    {
        global $bdd;
            
        $reponse = $bdd->prepare('SELECT commentaire_ID, commentaire_Niveau, commentaire_ID_chapitre, commentaire_Nom, commentaire_Message, DATE_FORMAT(commentaire_Date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentaire_Date_fr FROM blog_commentaire WHERE commentaire_ID_chapitre = :chapitre_ID ORDER BY commentaire_Date');
        $reponse->execute(array(':chapitre_ID' => $_GET['chapitre']));
        $commentaires_blogdetails = $reponse->fetchAll();
        
        
        return $commentaires_blogdetails;
    }


    public function insert_commentaires_blogdetails()
    {
        global $bdd;

        // quand le formulaire est envoyé :
        if(isset($_POST['submit'])){

            $_POST = array_map( 'stripslashes', $_POST );

            // collecter les données du formulaire
            extract($_POST);

            // validations
            if($commentaire_Nom == " "){
                $error[] = "Merci d'indiquer votre nom";
            }

            if($commentaire_Message == " "){
                $error[] = "Merci d'ajouter un message";
            }

            if(!isset($error)){

                try {

                //insertion dans la base de données
                $reponse = $bdd->prepare('INSERT INTO blog_commentaire (commentaire_ID_chapitre, commentaire_Nom, commentaire_Message, commentaire_Niveau, commentaire_Date) VALUES (:chapitre_ID, :commentaire_Nom, :commentaire_Message, :commentaire_Niveau, :commentaire_Date)') ;
                $reponse->execute(array(
                    ':chapitre_ID' => $commentaire_ID_chapitre,
                    ':commentaire_Nom' => $commentaire_Nom,
                    ':commentaire_Message' => $commentaire_Message,
                    ':commentaire_Niveau' => $commentaire_Niveau,
                    ':commentaire_Date' => date('Y-m-d H:i:s'),
                ));

                $insert_commentaires = $reponse;

                return $insert_commentaires;

                } catch(PDOException $e) {
                    echo $e->getMessage();
                }

            }
        }
    }

    
    public function update_commentaires_blogdetails()
    {
      global $bdd;

      if(isset($_GET['modcom'])){ 

          $reponse = $bdd->prepare('UPDATE blog_commentaire SET commentaire_Niveau = "1" WHERE commentaire_ID = :commentaire_ID');
          $reponse->execute(array(':commentaire_ID' => $_GET['modcom']));
          $update_commentaires = $reponse;

          return $update_commentaires;
      }

    }


    public function delete_moderation()
    {
        global $bdd;

        if(isset($_GET['delcom'])){ 

            $reponse = $bdd->prepare('DELETE FROM blog_commentaire WHERE commentaire_ID = :commentaire_ID') ;
            $reponse->execute(array(':commentaire_ID' => $_GET['delcom']));
            $delete_mod = $reponse;

            return $delete_mod;
        }

    }


    public function get_moderation()
    {
        global $bdd;
            
        $reponse = $bdd->prepare('SELECT commentaire_ID, commentaire_Niveau, commentaire_ID_chapitre, commentaire_Nom, commentaire_Message, DATE_FORMAT(commentaire_Date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentaire_Date_fr FROM blog_commentaire WHERE commentaire_Niveau = "1"');
        $reponse->execute();
        $moderation_signal = $reponse->fetchAll();
        
        
        return $moderation_signal;
    }


    public function get_moderation_modif()
    {
        global $bdd;
            
        $reponse = $bdd->prepare('SELECT commentaire_ID, commentaire_Nom, commentaire_Message, commentaire_Date FROM blog_commentaire WHERE commentaire_ID = :commentaire_ID');
        $reponse->execute(array(':commentaire_ID' => $_GET['id']));
        $moderation_modif = $reponse->fetchAll();
        
        
        return $moderation_modif;
    }


    public function update_moderation()
    {
        global $bdd;

        if(isset($_GET['okcom'])){ 

            $reponse = $bdd->prepare('UPDATE blog_commentaire SET commentaire_Niveau = "0" WHERE commentaire_ID = :commentaire_ID');
            $reponse->execute(array(':commentaire_ID' => $_GET['okcom']));
            $update_mod = $reponse;

            return $update_mod;
        }

    }


    public function update_moderation_modif()
    {
        global $bdd;

        if(isset($_POST['submit'])){

            $_POST = array_map( 'stripslashes', $_POST );

            // collecter les donnees du formulaire
            extract($_POST);

            // validations
            if($commentaire_ID ==''){
                $error[] = "L'ID de ce commentaire n'est pas valide !";
            }

            if($commentaire_Nom ==''){
                $error[] = "Merci d'écrire un nom";
            }

            if($commentaire_Message ==''){
                $error[] = "Merci d'ajouter un contenu";
            }

            if(!isset($error)){

                try {
                    //maj base de donnees
                    $reponse = $bdd->prepare('UPDATE blog_commentaire SET commentaire_Nom = :commentaire_Nom, commentaire_Message = :commentaire_Message, commentaire_Date = :commentaire_Date WHERE commentaire_ID = :commentaire_ID');
                    $reponse->execute(array(
                        ':commentaire_Nom' => $commentaire_Nom,
                        ':commentaire_Message' => $commentaire_Message,
                        ':commentaire_Date' => $commentaire_Date,
                        ':commentaire_ID' => $commentaire_ID
                    ));
                    $update_mod_modif = $reponse;

                    return $update_mod_modif;

                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
    }


}