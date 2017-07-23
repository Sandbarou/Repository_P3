<?php

// Création de la classe Commentaires
class Commentaires
{

    private $com_ID;
    private $com_Niveau;
    private $com_Auteur;
    private $com_Contenu;
    private $com_Date;
    private $bil_ID;

    public function __construct($_com_Niveau, $_com_Auteur, $_com_Contenu, $_bil_ID)
    {
        $this->com_Niveau = $_com_Niveau;
        $this->com_Auteur = $_com_Auteur;
        $this->com_Contenu = $_com_Contenu;
        $this->bil_ID = $_bil_ID;
    }

    // GETTERS //

    public function com_ID()
    {
        return $this->com_ID;
    }

    public function com_Niveau()
    {
        return $this->com_Niveau;
    }

    public function com_Auteur()
    {
        return $this->com_Auteur;
    }

    public function com_Contenu()
    {
        return $this->com_Contenu;
    }

    public function com_Date()
    {
        return $this->com_Date;
    }

    public function bil_ID()
    {
        return $this->bil_ID;
    }

    // SETTERS //

    public function setCom_ID($_com_ID)
    {
        $this->com_ID = (int)$_com_ID;
    }

    public function setCom_Niveau($_com_Niveau)
    {
        $this->com_Niveau = $_com_Niveau;
    }

    public function setCom_Nom($_com_Auteur)
    {
        $this->com_Auteur = $_com_Auteur;
    }

    public function setCom_Message($_com_Contenu)
    {
        $this->com_Contenu = $_com_Contenu;
    }

    public function setCom_Date($_com_Date)
    {
        $this->com_Date = $_com_Date;
    }

    public function setBil_ID($_bil_ID)
    {
        $this->bil_ID = (int)$_bil_ID;
    }


    // Renvoie la liste des commentaires associés à un billet
    public static function getCommentaires($idBillet)
    {
        global $bdd;

        $commentairesids = $bdd->prepare('SELECT * FROM t_commentaire WHERE bil_ID=?');
        $commentairesids->execute(array($idBillet));

        return $commentairesids;
    }


    public static function get_commentaires($offset, $limit)
    {
        global $bdd;
        $offset = (int)$offset;
        $limit = (int)$limit;

        $reponse = $bdd->prepare('SELECT com_Contenu, DATE_FORMAT(com_Date, \'%d/%m/%Y\') AS com_Date_FR, bil_ID FROM t_commentaire ORDER BY com_Date DESC LIMIT :offset, :limit');
        $reponse->bindParam(':offset', $offset, PDO::PARAM_INT);
        $reponse->bindParam(':limit', $limit, PDO::PARAM_INT);
        $reponse->execute();
        $commentaires = $reponse->fetchAll();

        return $commentaires;
    }


    public static function get_commentaires_blogdetails()
    {
        global $bdd;

        $reponse = $bdd->prepare('SELECT com_ID, com_Niveau, com_Auteur, com_Contenu, DATE_FORMAT(com_Date, \'%d/%m/%Y à %Hh%imin%ss\') AS com_Date_FR, bil_ID FROM t_commentaire WHERE bil_ID = :bil_ID ORDER BY com_Date');
        $reponse->execute(array(':bil_ID' => $_GET['id']));
        $commentaires_blogdetails = $reponse->fetchAll();

        return $commentaires_blogdetails;
    }


    public function insert_commentaires_blogdetails()
    {
        global $bdd;

        $_POST = array_map('stripslashes', $_POST);

        // Collecter les données du formulaire
        extract($_POST);

        try {

            // Insertion dans la base de données
            $reponse = $bdd->prepare('INSERT INTO t_commentaire (com_Niveau, com_Auteur, com_Contenu, com_Date, bil_ID) VALUES (:com_Niveau, :com_Auteur, :com_Contenu, :com_Date, :bil_ID)');
            $reponse->execute(array(
                ':com_Niveau' => $this->com_Niveau,
                ':com_Auteur' => $this->com_Auteur,
                ':com_Contenu' => $this->com_Contenu,
                ':com_Date' => $this->com_Date,
                ':bil_ID' => $this->bil_ID,
            ));

            $insert_commentaires = $reponse;

            return $insert_commentaires;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function update_commentaires_blogdetails()
    {
        global $bdd;

        if (isset($_GET['modcom'])) {

            $reponse = $bdd->prepare('UPDATE t_commentaire SET com_Niveau = "1" WHERE com_ID = :com_ID');
            $reponse->execute(array(':com_ID' => $_GET['modcom']));
            $update_commentaires = $reponse;

            return $update_commentaires;
        }

    }


    public function delete_moderation()
    {
        global $bdd;

        if (isset($_GET['delcom'])) {

            $reponse = $bdd->prepare('DELETE FROM t_commentaire WHERE com_ID = :com_ID');
            $reponse->execute(array(':com_ID' => $_GET['delcom']));
            $delete_mod = $reponse;

            return $delete_mod;
        }

    }


    public static function get_moderation()
    {
        global $bdd;

        $reponse = $bdd->prepare('SELECT com_ID, com_Niveau, com_Auteur, com_Contenu, DATE_FORMAT(com_Date, \'%d/%m/%Y à %Hh%imin%ss\') AS com_Date_FR, bil_ID FROM t_commentaire WHERE com_Niveau = "1"');
        $reponse->execute();
        $moderation_signal = $reponse->fetchAll();

        return $moderation_signal;
    }


    public static function get_moderation_modif()
    {
        global $bdd;

        $reponse = $bdd->prepare('SELECT com_ID, com_Auteur, com_Contenu, com_Date FROM t_commentaire WHERE com_ID = :com_ID');
        $reponse->execute(array(':com_ID' => $_GET['id']));
        $moderation_modif = $reponse->fetchAll();

        return $moderation_modif;
    }


    public function update_moderation()
    {
        global $bdd;

        if (isset($_GET['okcom'])) {

            $reponse = $bdd->prepare('UPDATE t_commentaire SET com_Niveau = "0" WHERE com_ID = :com_ID');
            $reponse->execute(array(':com_ID' => $_GET['okcom']));
            $update_mod = $reponse;

            return $update_mod;
        }

    }


    public function update_moderation_modif()
    {
        global $bdd;

        $_POST = array_map('stripslashes', $_POST);

        // Collecter les données du formulaire
        extract($_POST);

        try {
            // Maj base de données
            $reponse = $bdd->prepare('UPDATE t_commentaire SET com_Auteur = :com_Auteur, com_Contenu = :com_Contenu, com_Date = :com_Date WHERE com_ID = :com_ID');
            $reponse->execute(array(
                ':com_ID' => $com_ID,
                ':com_Auteur' => $com_Auteur,
                ':com_Contenu' => $com_Contenu,
                ':com_Date' => $com_Date,
            ));
            $update_mod_modif = $reponse;

            return $update_mod_modif;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


}