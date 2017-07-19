<?php

//création de la classe Chapitres
class Chapitres{

    private $BIL_ID;
  	private $BIL_TITRE;
  	private $BIL_AUTEUR;
  	private $BIL_CONTENU;
  	private $BIL_DATE;

    public function __construct($_BIL_TITRE, $_BIL_AUTEUR, $_BIL_CONTENU){
        $this->BIL_TITRE = $_BIL_TITRE;
        $this->BIL_AUTEUR = $_BIL_AUTEUR;
        $this->BIL_CONTENU = $_BIL_CONTENU;   
    }
    
   // GETTERS //

    public function BIL_ID(){
      return $this->BIL_ID;
    }
    public function BIL_TITRE(){
      return $this->BIL_TITRE;
    }
    public function BIL_AUTEUR(){
      return $this->BIL_AUTEUR;
    }
    public function BIL_CONTENU(){
      return $this->BIL_CONTENU;
    }
    public function BIL_DATE(){
      return $this->BIL_DATE;
    }

    // SETTERS //
  
    public function setId($_BIL_ID){
    	$this->BIL_ID = (int) $_BIL_ID;
    }
    public function setTitre($_BIL_TITRE){
    	$this->BIL_TITRE = $_BIL_TITRE;
    }
    public function setAuteur($_BIL_AUTEUR){
		$this->BIL_AUTEUR = $_BIL_AUTEUR;
    }
    public function setContenu($_BIL_CONTENU){
		$this->BIL_CONTENU = $_BIL_CONTENU;
    }
    public function setDate($_BIL_DATE){
		$this->BIL_DATE = $_BIL_DATE;
    }

    
    // Renvoie les informations sur un billet
    public static function getBillet($idBillet)
    {
        global $bdd;

        $billetids = $bdd->prepare('SELECT * FROM t_billet WHERE BIL_ID=?');
        $billetids->execute(array($idBillet));
        if ($billetids->rowCount() == 1)
        return $billetids->fetch();  // Accès à la première ligne de résultat
        else
        throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
}

    

    public static function get_chapitres_index($offset, $limit)
    {
        global $bdd;
        $offset = (int) $offset;
        $limit = (int) $limit;
            
        $reponse = $bdd->prepare('SELECT * FROM t_billet ORDER BY BIL_DATE ASC LIMIT :offset, :limit');
        $reponse->bindParam(':offset', $offset, PDO::PARAM_INT);
        $reponse->bindParam(':limit', $limit, PDO::PARAM_INT);
        $reponse->execute();
        $chapitres_index = $reponse->fetchAll();
                     
        return $chapitres_index;
    }


  	public static function get_chapitres_header($offset, $limit)
  	{
  	    global $bdd;
        $offset = (int) $offset;
  	    $limit = (int) $limit;
  	        
  	    $reponse = $bdd->prepare('SELECT * FROM t_billet ORDER BY BIL_DATE DESC LIMIT :offset, :limit');
  	    $reponse->bindParam(':offset', $offset, PDO::PARAM_INT);
  	    $reponse->bindParam(':limit', $limit, PDO::PARAM_INT);
  	    $reponse->execute();
  	    $chapitres_header = $reponse->fetchAll();
    
  	    return $chapitres_header;
  	}


    public static function get_chapitres_blog()
    {
        global $bdd;
           
        $reponse = $bdd->prepare('SELECT BIL_ID, BIL_TITRE, BIL_AUTEUR, BIL_CONTENU, DATE_FORMAT(BIL_DATE, \'%d/%m/%Y\') AS BIL_DATE_FR FROM t_billet ORDER BY BIL_DATE DESC');
        $reponse->execute();
        $chapitres_blog = $reponse->fetchAll();
        
        return $chapitres_blog;
    }


    public static function get_chapitres_blogdetails()
    {
        global $bdd;

        $reponse = $bdd->prepare('SELECT BIL_ID, BIL_TITRE, BIL_AUTEUR, BIL_CONTENU, DATE_FORMAT(BIL_DATE, \'%d/%m/%Y\') AS BIL_DATE_FR FROM t_billet WHERE BIL_ID = :BIL_ID');
        $reponse->execute(array(':BIL_ID' => $_GET['id']));
        $chapitres_blogdetails = $reponse->fetchAll();
                
        return $chapitres_blogdetails;
    }


    public static function get_chapitres_admin()
    {
        global $bdd;
            
        $reponse = $bdd->prepare('SELECT * FROM t_billet WHERE BIL_ID = :BIL_ID');
        $reponse->execute(array(':BIL_ID' => $_GET['id']));
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
            if($BIL_TITRE ==''){
                $error[] = "Merci d'écrire un titre";
            }

            if($BIL_CONTENU ==''){
                $error[] = "Merci d'ajouter un contenu";
            }

            if(!isset($error)){

                try {

                    //insertion dans la base de donnees
                    $reponse = $bdd->prepare('INSERT INTO t_billet (BIL_DATE, BIL_TITRE, BIL_AUTEUR, BIL_CONTENU) VALUES (:BIL_DATE, :BIL_TITRE, :BIL_AUTEUR, :BIL_CONTENU)') ;
                    $reponse->execute(array(
                        ':BIL_DATE' => $this->BIL_DATE,
                        ':BIL_TITRE' => $this->BIL_TITRE,
                        ':BIL_AUTEUR' => $this->BIL_AUTEUR,
                        ':BIL_CONTENU' => $this->BIL_CONTENU,
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
            if($BIL_ID ==''){
                $error[] = "L'ID de ce chapitre n'est pas valide !";
            }

            if($BIL_TITRE ==''){
                $error[] = "Merci d'écrire un titre";
            }

            if($BIL_CONTENU ==''){
                $error[] = "Merci d'ajouter un contenu";
            }

            if(!isset($error)){

                try {

                    //maj base de donnees
                    $reponse = $bdd->prepare('UPDATE t_billet SET BIL_DATE = :BIL_DATE, BIL_TITRE = :BIL_TITRE, BIL_AUTEUR = :BIL_AUTEUR, BIL_CONTENU = :BIL_CONTENU WHERE BIL_ID = :BIL_ID') ;
                    $reponse->execute(array(
                        ':BIL_ID' => $BIL_ID,
                        ':BIL_DATE' => $BIL_DATE,
                        ':BIL_TITRE' => $BIL_TITRE,
                        ':BIL_AUTEUR' => $BIL_AUTEUR,
                        ':BIL_CONTENU' => $BIL_CONTENU,
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

            $reponse = $bdd->prepare('DELETE FROM t_billet WHERE BIL_ID = :BIL_ID') ;
            $reponse->execute(array(':BIL_ID' => $_GET['delpost']));
            $delete_chap = $reponse;

            return $delete_chap;
      }

    }

}