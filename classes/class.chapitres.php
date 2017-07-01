<?php

//création de la classe Chapitres
class Chapitres{


    private $_chapitre_ID;
  	private $_chapitre_Titre;
  	private $_chapitre_Auteur;
  	private $_chapitre_Contenu;
  	private $_chapitre_Date;

   // GETTERS //

    public function chapitre_ID(){
      return $this->chapitre_ID;
    }
    public function chapitre_Titre(){
      return $this->chapitre_Titre;
    }
    public function chapitre_Auteur(){
      return $this->chapitre_Auteur;
    }
    public function chapitre_Contenu(){
      return $this->chapitre_Contenu;
    }
    public function chapitre_Date(){
      return $this->chapitre_Date;
    }

    // SETTERS //
  
    public function setId($_chapitre_ID){
    	$this->chapitre_ID = (int) $_chapitre_ID;
    }
    public function setTitre($_chapitre_Titre){
    	$this->chapitre_Titre = $_chapitre_Titre;
    }
    public function setAuteur($_chapitre_Auteur){
		$this->chapitre_Auteur = $_chapitre_Auteur;
    }
    public function setContenu($_chapitre_Contenu){
		$this->chapitre_Contenu = $_chapitre_Contenu;
    }
    public function setDate($_chapitre_Date){
		$this->chapitre_Date = $_chapitre_Date;
    }


    public function get_chapitres_index($offset, $limit)
    {
        global $bdd;
        $offset = (int) $offset;
        $limit = (int) $limit;
            
        $reponse = $bdd->prepare('SELECT chapitre_ID, chapitre_Titre, DATE_FORMAT(chapitre_Date, \'%d/%m/%Y\') AS chapitre_Date_fr FROM blog_chapitre ORDER BY chapitre_Date ASC LIMIT :offset, :limit');
        $reponse->bindParam(':offset', $offset, PDO::PARAM_INT);
        $reponse->bindParam(':limit', $limit, PDO::PARAM_INT);
        $reponse->execute();
        $chapitres_index = $reponse->fetchAll();
                     
        return $chapitres_index;
    }


  	public function get_chapitres_header($offset, $limit)
  	{
  	    global $bdd;
        $offset = (int) $offset;
  	    $limit = (int) $limit;
  	        
  	    $reponse = $bdd->prepare('SELECT chapitre_ID, DATE_FORMAT(chapitre_Date, \'%d/%m/%Y\') AS chapitre_Date_fr FROM blog_chapitre ORDER BY chapitre_Date DESC LIMIT :offset, :limit');
  	    $reponse->bindParam(':offset', $offset, PDO::PARAM_INT);
  	    $reponse->bindParam(':limit', $limit, PDO::PARAM_INT);
  	    $reponse->execute();
  	    $chapitres_header = $reponse->fetchAll();
  	    	    
  	    return $chapitres_header;
  	}


    public function get_chapitres_blog()
    {
        global $bdd;
           
        $reponse = $bdd->prepare('SELECT chapitre_ID, chapitre_Titre, chapitre_Auteur, chapitre_Contenu, DATE_FORMAT(chapitre_Date, \'%d/%m/%Y\') AS chapitre_Date_fr FROM blog_chapitre ORDER BY chapitre_Date DESC');
        $reponse->execute();
        $chapitres_blog = $reponse->fetchAll();
        
        return $chapitres_blog;
    }


    public function get_chapitres_blogdetails()
    {
        global $bdd;

        $reponse = $bdd->prepare('SELECT chapitre_ID, chapitre_Titre, chapitre_Auteur, chapitre_Contenu, DATE_FORMAT(chapitre_Date, \'%d/%m/%Y\') AS chapitre_Date_fr FROM blog_chapitre WHERE chapitre_ID = :chapitre_ID');
        $reponse->execute(array(':chapitre_ID' => $_GET['chapitre']));
        $chapitres_blogdetails = $reponse->fetchAll();
                
        return $chapitres_blogdetails;
    }


    public function get_chapitres_admin()
    {
        global $bdd;
            
        $reponse = $bdd->prepare('SELECT chapitre_ID, chapitre_Titre, chapitre_Auteur, chapitre_Contenu, chapitre_Date FROM blog_chapitre WHERE chapitre_ID = :chapitre_ID');
        $reponse->execute(array(':chapitre_ID' => $_GET['chapitre']));
        $chapitres_admin = $reponse->fetchAll();
        
        return $chapitres_admin;
    }


    public function insert_chapitres()
    {
        global $bdd;

        // quand le formulaire est envoye :
        if(isset($_POST['submit'])){

            $_POST = array_map( 'stripslashes', $_POST );

            // collecter les donnees du formulaire
            extract($_POST);

            // validations
            if($chapitre_Titre ==''){
                $error[] = "Merci d'écrire un titre";
            }

            if($chapitre_Contenu ==''){
                $error[] = "Merci d'ajouter un contenu";
            }

            if(!isset($error)){

                try {

                    //insertion dans la base de donnees
                    $reponse = $bdd->prepare('INSERT INTO blog_chapitre (chapitre_Auteur, chapitre_Titre, chapitre_Contenu, chapitre_Date) VALUES (:chapitre_Auteur, :chapitre_Titre, :chapitre_Contenu, :chapitre_Date)') ;
                    $reponse->execute(array(
                        ':chapitre_Auteur' => $chapitre_Auteur,
                        ':chapitre_Titre' => $chapitre_Titre,
                        ':chapitre_Contenu' => $chapitre_Contenu,
                        ':chapitre_Date' => $chapitre_Date,
                    ));

                    $insert_chap = $reponse;

                    return $insert_chap;

                } catch(PDOException $e) {
                    echo $e->getMessage();
                }

            }

        }
        
    }



    public function update_chapitres()
    {
        global $bdd;

        // quand le formulaire est envoye :
        if(isset($_POST['submit'])){

            $_POST = array_map( 'stripslashes', $_POST );

            // collecter les donnees du formulaire
            extract($_POST);

            // validations
            if($chapitre_ID ==''){
                $error[] = "L'ID de ce chapitre n'est pas valide !";
            }

            if($chapitre_Titre ==''){
                $error[] = "Merci d'écrire un titre";
            }

            if($chapitre_Contenu ==''){
                $error[] = "Merci d'ajouter un contenu";
            }

            if(!isset($error)){

                try {

                    //maj base de donnees
                    $reponse = $bdd->prepare('UPDATE blog_chapitre SET chapitre_Auteur = :chapitre_Auteur, chapitre_Titre = :chapitre_Titre, chapitre_Contenu = :chapitre_Contenu, chapitre_Date = :chapitre_Date WHERE chapitre_ID = :chapitre_ID') ;
                    $reponse->execute(array(
                        ':chapitre_Auteur' => $chapitre_Auteur,
                        ':chapitre_Titre' => $chapitre_Titre,
                        ':chapitre_Contenu' => $chapitre_Contenu,
                        ':chapitre_Date' => $chapitre_Date,
                        ':chapitre_ID' => $chapitre_ID
                    ));

                    $update_chap = $reponse;

                    return $update_chap;

                } catch(PDOException $e) {
                    echo $e->getMessage();
                }

            }

        }
        
    }
    

    public function delete_chapitres()
    {
        global $bdd;

        if(isset($_GET['delpost'])){ 

            $reponse = $bdd->prepare('DELETE FROM blog_chapitre WHERE chapitre_ID = :chapitre_ID') ;
            $reponse->execute(array(':chapitre_ID' => $_GET['delpost']));
            $delete_chap = $reponse;

            return $delete_chap;
      }

    }

}