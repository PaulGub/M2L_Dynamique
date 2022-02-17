<?php

include 'lib/Hydrate.php';

class User
{
    use Hydrate;
    private $idUser;
    private $nom;
    private $prenom;
    private $login;
    private $statut;
    private $libelle;
    private $nomLigue;
    private $nomClub;

    public function __construct() { }




    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @return mixed
     */
    public function getNomLigue()
    {
        return $this->nomLigue;
    }

    /**
     * @return mixed
     */
    public function getNomClub()
    {
        return $this->nomClub;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @param mixed $nomUtilisateur
     */
    public function setNom($nomUtilisateur)
    {
        $this->nom = $nomUtilisateur;
    }

    /**
     * @param mixed $prenomUtilisateur
     */
    public function setPrenom($prenomUtilisateur)
    {
        $this->prenom = $prenomUtilisateur;
    }

    /**
     * @param mixed $loginUtilisateur
     */
    public function setLogin($loginUtilisateur)
    {
        $this->login = $loginUtilisateur;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @param mixed $fonction
     */
    public function setLibelle($fonction)
    {
        $this->libelle = $fonction;
    }

    /**
     * @param mixed $ligue
     */
    public function setNomLigue($ligue)
    {
        $this->nomLigue = $ligue;
    }

    /**
     * @param mixed $nomClub
     */
    public function setNomClub($nomClub)
    {
        $this->nomClub = $nomClub;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

}