<?php

require_once 'modele/dao/connexionDAO.php';
require_once 'modele/dto/User.php';
require_once 'modele/dao/UserDAO.php';

if(isset($_GET['m2lMP'])){
	$_SESSION['m2lMP']= $_GET['m2lMP'];
}
else
{
	if(!isset($_SESSION['m2lMP'])){
		$_SESSION['m2lMP']="accueil";
	}
}


$m2lMP = new Menu("m2lMP");

if(!isset($_SESSION['identification'])){
    $m2lMP->ajouterComposant($m2lMP->creerItemLien("accueil", "Accueil"));
    $m2lMP->ajouterComposant($m2lMP->creerItemLien("services", "Services"));
    $m2lMP->ajouterComposant($m2lMP->creerItemLien("locaux", "Locaux"));
    $m2lMP->ajouterComposant($m2lMP->creerItemLien("ligues", "Ligues"));
    $m2lMP->ajouterComposant($m2lMP->creerItemLien("connexion", "Se connecter"));
}
else{
    $t = unserialize($_SESSION['identification']);
    $m2lMP->ajouterComposant($m2lMP->creerItemLien("accueil", "Accueil"));
    switch ($t->getStatut()){
        case "Gestionnaire Formation":
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("listeDemandeFormation", "Liste des demandes des formations"));
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("listeDemandeIntervenant", "Demandes des intervenants"));
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("gestionFormation", "Gestion des Formations"));
            break;

        case "Salarie":
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("contrats", "Mes contrats"));
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("salaire", "Mes bulletins de salaire"));
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("infos", "Mes informations personnelles"));
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("listeFormation", "Les formations"));
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("demandeFormation", "Mes demandes"));
            break;

        case "Benevole":
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("infos", "Mes informations  personnelles"));
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("listeFormation", "Les formations"));
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("demandeFormation", "Mes demandes"));
            break;

        case "Gestionnaire Salaire":
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("gestionContrats", "Gestion contrats"));
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("gestionBulletins", "Gestion bulletins"));
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("gestionCompte", "Gestion comptes"));
            break;

        //TODO MISSION 1
        case "Gestionnaire Ligue Club":
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("ligues", "Ligues"));
            break;
        default:
            $m2lMP->ajouterComposant($m2lMP->creerItemLien("services", "Services"));
            break;

    }
    $m2lMP->ajouterComposant($m2lMP->creerItemLien("deconnexion", "Déconnexion"));
}

$menuPrincipalM2L = $m2lMP->creerMenu($_SESSION['m2lMP'],'m2lMP');

// GESTION DES CONTRATS

//Formulaire création de contrat
if (isset($_POST['submitCréationContrats'])){
    $casta = UserDAO::creationContrat($_POST['idContrat'], $_POST['dateDebut'], $_POST['dateFin'], $_POST['typeContrat'],$_POST['nbHeures'],$_POST['idUser']);
}

//Formulaire modification de contrat
if (isset($_POST['submitModificationContrats'])){
    $casta2 = UserDAO::modificationContrat($_POST['ancidContrat'],$_POST['idContrat'], $_POST['dateDebut'], $_POST['dateFin'], $_POST['typeContrat'],$_POST['nbHeures'],$_POST['idUser']);
}

//Formulaire supression de contrat
if (isset($_POST['submitSupprimerContrats'])){
    $casta3 = UserDAO::supressionContrat($_POST['idContrat']);
}

// GESTION DES BULLETINS

//Formulaire création de bulletins
if (isset($_POST['submitCréationBulletins'])){
    $casto = UserDAO::creationBulletin($_POST['idBulletin'], $_POST['mois'], $_POST['annee'], $_POST['bulletinPDF'],$_POST['idContrat']);
}

//Formulaire modification de bulletins
if (isset($_POST['submitModificationBulletins'])){
    $casto2 = UserDAO::modificationBulletin($_POST['ancidBulletin'],$_POST['idBulletin'], $_POST['mois'], $_POST['annee'], $_POST['bulletinPDF'],$_POST['idContrat']);
}

//Formulaire création de bulletins
if (isset($_POST['submitSupprimerBulletins'])){
    $casto3 = UserDAO::supressionBulletin($_POST['idBulletin']);
}

// GESTION DES COMPTES

//Formulaire création de comptes
if (isset($_POST['submitCréationCompte'])){
    $caste = UserDAO::creationCompte($_POST['idUser'], $_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['mdp'], $_POST['statut'] ,$_POST['idFonc'], $_POST['idLigue'], $_POST['idClub']);
}

//Formulaire modification de compte
if (isset($_POST['submitModificationCompte'])){
    $caste2 = UserDAO::modificationCompte($_POST['ancidUser'],$_POST['idUser'], $_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['mdp'] ,$_POST['statut'],$_POST['idFonc'],$_POST['idLigue'],$_POST['idClub']);
}

//Formulaire création de bulletins
if (isset($_POST['submitSupprimerCompte'])){
    $caste3 = UserDAO::supressionCompte($_POST['idUser']);
}

include_once dispatcher::dispatch($_SESSION['m2lMP']);

if(isset($_POST['login']) && isset($_POST['mdp'])){
    //Si l'utilisateur s'est bien authentifié
    if(connexionDAO::authentication($_POST['login'], $_POST['mdp']) == 1){

        //Création de l'objet User et attribution à la variable de session identification
        $utilisateur = new User();
		var_dump($_POST['login']);
        $utilisateur->hydrate(UserDAO::infoLogin($_POST['login']));
        $_SESSION['identification']= serialize($utilisateur);
        $_SESSION['m2lMP']="accueil";
        header('location: index.php');
    }
}