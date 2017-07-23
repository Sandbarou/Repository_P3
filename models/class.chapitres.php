<?php

// Création de la classe Chapitres
class Chapitres
{

    private $bil_ID;
    private $bil_Titre;
    private $bil_Auteur;
    private $bil_Contenu;
    private $bil_Date;

    public function __construct($_bil_Titre, $_bil_Auteur, $_bil_Contenu)
    {
        $this->bil_Titre = $_bil_Titre;
        $this->bil_Auteur = $_bil_Auteur;
        $this->bil_Contenu = $_bil_Contenu;
    }

    // GETTERS //

    public function bil_ID()
    {
        return $this->bil_ID;
    }

    public function bil_Titre()
    {
        return $this->bil_Titre;
    }

    public function bil_Auteur()
    {
        return $this->bil_Auteur;
    }

    public function bil_Contenu()
    {
        return $this->bil_Contenu;
    }

    public function bil_Date()
    {
        return $this->bil_Date;
    }

    // SETTERS //

    public function setId($_bil_ID)
    {
        $this->bil_ID = (int)$_bil_ID;
    }

    public function setTitre($_bil_Titre)
    {
        $this->bil_Titre = $_bil_Titre;
    }

    public function setAuteur($_bil_Auteur)
    {
        $this->bil_Auteur = $_bil_Auteur;
    }

    public function setContenu($_bil_Contenu)
    {
        $this->bil_Contenu = $_bil_Contenu;
    }

    public function setDate($_bil_Date)
    {
        $this->bil_Date = $_bil_Date;
    }


    // Renvoie les informations sur un billet
    public static function getBillet($idBillet)
    {
        global $bdd;

        $billetids = $bdd->prepare('SELECT * FROM t_billet WHERE bil_ID=?');
        $billetids->execute(array($idBillet));
        if ($billetids->rowCount() == 1)
            return $billetids->fetch();
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }


    public static function get_chapitres_index($offset, $limit)
    {
        global $bdd;
        $offset = (int)$offset;
        $limit = (int)$limit;

        $reponse = $bdd->prepare('SELECT * FROM t_billet ORDER BY bil_Date ASC LIMIT :offset, :limit');
        $reponse->bindParam(':offset', $offset, PDO::PARAM_INT);
        $reponse->bindParam(':limit', $limit, PDO::PARAM_INT);
        $reponse->execute();
        $chapitres_index = $reponse->fetchAll();

        return $chapitres_index;
    }


    public static function get_chapitres_header($offset, $limit)
    {
        global $bdd;
        $offset = (int)$offset;
        $limit = (int)$limit;

        $reponse = $bdd->prepare('SELECT * FROM t_billet ORDER BY bil_Date DESC LIMIT :offset, :limit');
        $reponse->bindParam(':offset', $offset, PDO::PARAM_INT);
        $reponse->bindParam(':limit', $limit, PDO::PARAM_INT);
        $reponse->execute();
        $chapitres_header = $reponse->fetchAll();

        return $chapitres_header;
    }


    public static function get_chapitres_blog()
    {
        global $bdd;

        $reponse = $bdd->prepare('SELECT bil_ID, bil_Titre, bil_Auteur, bil_Contenu, DATE_FORMAT(bil_Date, \'%d/%m/%Y\') AS bil_Date_FR FROM t_billet ORDER BY bil_Date DESC');
        $reponse->execute();
        $chapitres_blog = $reponse->fetchAll();

        return $chapitres_blog;
    }


    public static function get_chapitres_blogdetails()
    {
        global $bdd;

        $reponse = $bdd->prepare('SELECT bil_ID, bil_Titre, bil_Auteur, bil_Contenu, DATE_FORMAT(bil_Date, \'%d/%m/%Y\') AS bil_Date_FR FROM t_billet WHERE bil_ID = :bil_ID');
        $reponse->execute(array(':bil_ID' => $_GET['id']));
        $chapitres_blogdetails = $reponse->fetchAll();

        return $chapitres_blogdetails;
    }


    public static function get_chapitres_admin()
    {
        global $bdd;

        $reponse = $bdd->prepare('SELECT * FROM t_billet WHERE bil_ID = :bil_ID');
        $reponse->execute(array(':bil_ID' => $_GET['id']));
        $chapitres_admin = $reponse->fetchAll();

        return $chapitres_admin;
    }


    public function insert_chapitres()
    {
        global $bdd;

        $_POST = array_map('stripslashes', $_POST);

        // Collecter les données du formulaire
        extract($_POST);

        try {

            // Insertion dans la base de données
            $reponse = $bdd->prepare('INSERT INTO t_billet (bil_Titre, bil_Auteur, bil_Contenu, bil_Date) VALUES (:bil_Titre, :bil_Auteur, :bil_Contenu, :bil_Date)');
            $reponse->execute(array(
                ':bil_Titre' => $this->bil_Titre,
                ':bil_Auteur' => $this->bil_Auteur,
                ':bil_Contenu' => $this->bil_Contenu,
                ':bil_Date' => $bil_Date,
            ));

            $insert_chap = $reponse;

            return $insert_chap;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function update_chapitres()
    {
        global $bdd;

        $_POST = array_map('stripslashes', $_POST);

        // Collecter les données du formulaire
        extract($_POST);

        try {

            // Maj base de données
            $reponse = $bdd->prepare('UPDATE t_billet SET bil_Date = :bil_Date, bil_Titre = :bil_Titre, bil_Auteur = :bil_Auteur, bil_Contenu = :bil_Contenu WHERE bil_ID = :bil_ID');
            $reponse->execute(array(
                ':bil_ID' => $bil_ID,
                ':bil_Date' => $bil_Date,
                ':bil_Titre' => $bil_Titre,
                ':bil_Auteur' => $bil_Auteur,
                ':bil_Contenu' => $bil_Contenu,
            ));

            $update_chap = $reponse;

            return $update_chap;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }


    public function delete_chapitres()
    {
        global $bdd;

        if (isset($_GET['delpost'])) {

            $reponse = $bdd->prepare('DELETE FROM t_billet WHERE bil_ID = :bil_ID');
            $reponse->execute(array(':bil_ID' => $_GET['delpost']));
            $delete_chap = $reponse;

            return $delete_chap;
        }

    }

}