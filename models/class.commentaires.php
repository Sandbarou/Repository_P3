<?php

//création de la classe Commentaires
class Commentaires{


    private $_COM_ID;
  	private $_COM_NIVEAU;
   	private $_COM_AUTEUR;
  	private $_COM_CONTENU;
  	private $_COM_DATE;
    private $_BIL_ID;

    // GETTERS //

    public function COM_ID(){
      return $this->COM_ID;
    }
    public function COM_NIVEAU(){
      return $this->COM_NIVEAU;
    }
    public function COM_AUTEUR(){
      return $this->COM_AUTEUR;
    }
    public function COM_CONTENU(){
      return $this->COM_CONTENU;
    }
    public function COM_DATE(){
      return $this->COM_DATE;
    }
    public function BIL_ID(){
      return $this->BIL_ID;
    }

    // SETTERS //
  
    public function setCom_ID($_COM_ID){
    	$this->COM_ID = (int) $_COM_ID;
    }
    public function setCom_Niveau($_COM_NIVEAU){
    	$this->COM_NIVEAU = $_COM_NIVEAU;
    }
    public function setCom_Nom($_COM_AUTEUR){
		$this->COM_AUTEUR = $_COM_AUTEUR;
    }
    public function setCom_Message($_COM_CONTENU){
		$this->COM_CONTENU = $_COM_CONTENU;
    }
    public function setCom_Date($_COM_DATE){
		$this->COM_DATE = $_COM_DATE;
    }
    public function setBIL_ID($_BIL_ID){
    	$this->BIL_ID = (int) $_BIL_ID;
    }

    
    // Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet)
    {
        global $bdd;

        $commentairesids = $bdd->prepare('SELECT * FROM T_COMMENTAIRE WHERE BIL_ID=?');
        $commentairesids->execute(array($idBillet));
        
        return $commentairesids;
    }
    
    
    

    public function get_commentaires($offset, $limit)
    {
        global $bdd;
        $offset = (int) $offset;
        $limit = (int) $limit;
            
        $reponse = $bdd->prepare('SELECT COM_CONTENU, BIL_ID, DATE_FORMAT(COM_DATE, \'%d/%m/%Y\') AS COM_DATE_FR FROM T_COMMENTAIRE ORDER BY COM_DATE DESC LIMIT :offset, :limit');
        $reponse->bindParam(':offset', $offset, PDO::PARAM_INT);
        $reponse->bindParam(':limit', $limit, PDO::PARAM_INT);
        $reponse->execute();
        $commentaires = $reponse->fetchAll();
                
        return $commentaires;
    }
    

    public function get_commentaires_blogdetails()
    {
        global $bdd;
            
        $reponse = $bdd->prepare('SELECT COM_ID, COM_NIVEAU, BIL_ID, COM_AUTEUR, COM_CONTENU, DATE_FORMAT(COM_DATE, \'%d/%m/%Y à %Hh%imin%ss\') AS COM_DATE_FR FROM T_COMMENTAIRE WHERE BIL_ID = :BIL_ID ORDER BY COM_DATE');
        $reponse->execute(array(':BIL_ID' => $_GET['id']));
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
            if($COM_AUTEUR == " "){
                $error[] = "Merci d'indiquer votre nom";
            }

            if($COM_CONTENU == " "){
                $error[] = "Merci d'ajouter un message";
            }

            if(!isset($error)){

                try {

                //insertion dans la base de données
                $reponse = $bdd->prepare('INSERT INTO T_COMMENTAIRE (BIL_ID, COM_AUTEUR, COM_CONTENU, COM_NIVEAU, COM_DATE) VALUES (:BIL_ID, :COM_AUTEUR, :COM_CONTENU, :COM_NIVEAU, :COM_DATE)') ;
                $reponse->execute(array(
                    ':BIL_ID' => $BIL_ID,
                    ':COM_AUTEUR' => $COM_AUTEUR,
                    ':COM_CONTENU' => $COM_CONTENU,
                    ':COM_NIVEAU' => $COM_NIVEAU,
                    ':COM_DATE' => date('Y-m-d H:i:s'),
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

          $reponse = $bdd->prepare('UPDATE T_COMMENTAIRE SET COM_NIVEAU = "1" WHERE COM_ID = :COM_ID');
          $reponse->execute(array(':COM_ID' => $_GET['modcom']));
          $update_commentaires = $reponse;

          return $update_commentaires;
      }

    }


    public function delete_moderation()
    {
        global $bdd;

        if(isset($_GET['delcom'])){ 

            $reponse = $bdd->prepare('DELETE FROM T_COMMENTAIRE WHERE COM_ID = :COM_ID') ;
            $reponse->execute(array(':COM_ID' => $_GET['delcom']));
            $delete_mod = $reponse;

            return $delete_mod;
        }

    }


    public function get_moderation()
    {
        global $bdd;
            
        $reponse = $bdd->prepare('SELECT COM_ID, COM_NIVEAU, BIL_ID, COM_AUTEUR, COM_CONTENU, DATE_FORMAT(COM_DATE, \'%d/%m/%Y à %Hh%imin%ss\') AS COM_DATE_FR FROM T_COMMENTAIRE WHERE COM_NIVEAU = "1"');
        $reponse->execute();
        $moderation_signal = $reponse->fetchAll();
                
        return $moderation_signal;
    }


    public function get_moderation_modif()
    {
        global $bdd;
            
        $reponse = $bdd->prepare('SELECT COM_ID, COM_AUTEUR, COM_CONTENU, COM_DATE FROM T_COMMENTAIRE WHERE COM_ID = :COM_ID');
        $reponse->execute(array(':COM_ID' => $_GET['id']));
        $moderation_modif = $reponse->fetchAll();
                
        return $moderation_modif;
    }


    public function update_moderation()
    {
        global $bdd;

        if(isset($_GET['okcom'])){ 

            $reponse = $bdd->prepare('UPDATE T_COMMENTAIRE SET COM_NIVEAU = "0" WHERE COM_ID = :COM_ID');
            $reponse->execute(array(':COM_ID' => $_GET['okcom']));
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
            if($COM_ID ==''){
                $error[] = "L'ID de ce commentaire n'est pas valide !";
            }

            if($COM_AUTEUR ==''){
                $error[] = "Merci d'écrire un nom";
            }

            if($COM_CONTENU ==''){
                $error[] = "Merci d'ajouter un contenu";
            }

            if(!isset($error)){

                try {
                    //maj base de donnees
                    $reponse = $bdd->prepare('UPDATE T_COMMENTAIRE SET COM_AUTEUR = :COM_AUTEUR, COM_CONTENU = :COM_CONTENU, COM_DATE = :COM_DATE WHERE COM_ID = :COM_ID');
                    $reponse->execute(array(
                        ':COM_AUTEUR' => $COM_AUTEUR,
                        ':COM_CONTENU' => $COM_CONTENU,
                        ':COM_DATE' => $COM_DATE,
                        ':COM_ID' => $COM_ID,
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