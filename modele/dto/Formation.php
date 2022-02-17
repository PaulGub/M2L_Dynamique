<?php



class Formation{

    use Hydrate;

    //id de la formation
    private $idForma;

    //Intitule de la formation
    private $intitule;

    //Description de la formation
    private $descriptif;

    //Durée de la formation
    private $duree;

    //Date d'ouverture des inscriptions
    private $dateOuvertInscription;

    //Date de cloture des inscriptions
    private $dateClotureInscription;

    //Date de début de la formation
    private $dateDebutFormation;

    //Date de fin de la formation
    private $dateFinFormation;

    //Nombre maximum de personne pour la formation
    private $nbMaxInscription;

    public function __construct(){}

    /**
     * @return mixed
     */
    public function getIdForma()
    {
        return $this->idForma;
    }

    /**
     * @return mixed
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * @return mixed
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @return mixed
     */
    public function getDateOuvertInscription()
    {
        return $this->dateOuvertInscription;
    }

    /**
     * @return mixed
     */
    public function getDateClotureInscription()
    {
        return $this->dateClotureInscription;
    }

    /**
     * @return mixed
     */
    public function getDateDebutFormation()
    {
        return $this->dateDebutFormation;
    }

    /**
     * @return mixed
     */
    public function getDateFinFormation()
    {
        return $this->dateFinFormation;
    }

    /**
     * @return mixed
     */
    public function getNbMaxInscription()
    {
        return $this->nbMaxInscription;
    }

    /**
     * @param mixed $idForma
     */
    public function setIdForma($idForma)
    {
        $this->idForma = $idForma;
    }

    /**
     * @param mixed $intitule
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    }

    /**
     * @param mixed $descriptif
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @param mixed $dateOuvertInscription
     */
    public function setDateOuvertInscription($dateOuvertInscription)
    {
        $this->dateOuvertInscription = $dateOuvertInscription;
    }

    /**
     * @param mixed $dateClotureInscription
     */
    public function setDateClotureInscription($dateClotureInscription)
    {
        $this->dateClotureInscription = $dateClotureInscription;
    }

    /**
     * @param mixed $dateDebutFormation
     */
    public function setDateDebutFormation($dateDebutFormation)
    {
        $this->dateDebutFormation = $dateDebutFormation;
    }

    /**
     * @param mixed $dateFinFormation
     */
    public function setDateFinFormation($dateFinFormation)
    {
        $this->dateFinFormation = $dateFinFormation;
    }

    /**
     * @param mixed $nbMaxInscription
     */
    public function setNbMaxInscription($nbMaxInscription)
    {
        $this->nbMaxInscription = $nbMaxInscription;
    }

}