<?php
include_once "lib/Affichage.php";
//formulaire création de contrat

$formulaireCreaContrats = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
	
$formulaireCreaContrats->ajouterComposantLigne($formulaireCreaContrats->creerLabel('Début du contrat:'));
$formulaireCreaContrats->ajouterComposantTab();
$formulaireCreaContrats->ajouterComposantLigne($formulaireCreaContrats->creerInputTexte('dateDebut', 'dateDebut',  '',2, 'Entrez la date de début du contrat', ''));
$formulaireCreaContrats->ajouterComposantTab();


$formulaireCreaContrats->ajouterComposantLigne($formulaireCreaContrats->creerLabel('Fin du contrat:'));
$formulaireCreaContrats->ajouterComposantTab();
$formulaireCreaContrats->ajouterComposantLigne($formulaireCreaContrats->creerInputTexte('dateFin', 'dateFin',  '',3, 'Entrez la date de fin du contrat', ''));
$formulaireCreaContrats->ajouterComposantTab();

$formulaireCreaContrats->ajouterComposantLigne($formulaireCreaContrats->creerLabel('Type du contrat:'));
$formulaireCreaContrats->ajouterComposantTab();
$formulaireCreaContrats->ajouterComposantLigne($formulaireCreaContrats->creerInputTexte('typeContrat', 'typeContrat',  '',4, 'Entrez le type du contrat', ''));
$formulaireCreaContrats->ajouterComposantTab();

$formulaireCreaContrats->ajouterComposantLigne($formulaireCreaContrats->creerLabel('Nombre heures:'));
$formulaireCreaContrats->ajouterComposantTab();
$formulaireCreaContrats->ajouterComposantLigne($formulaireCreaContrats->creerInputTexte('nbHeures', 'nbHeures',  '',5, 'Entrez le nombre heures', ''));
$formulaireCreaContrats->ajouterComposantTab();

$formulaireCreaContrats->ajouterComposantLigne($formulaireCreaContrats->creerLabel('Identifiant du salarié:'));
$formulaireCreaContrats->ajouterComposantTab();
$formulaireCreaContrats->ajouterComposantLigne($formulaireCreaContrats->creerInputTexte('idUser', 'idUser',  '',6, 'Entrez identifiant du salarié', ''));
$formulaireCreaContrats->ajouterComposantTab();


$formulaireCreaContrats->ajouterComposantLigne($formulaireCreaContrats-> creerInputSubmit('submitCréationContrats', 'submitCréationContrats', 'Création du contrat'));
$formulaireCreaContrats->ajouterComposantTab();

$formulaireCreaContrats->creerFormulaire();

//formulaire modification de contrat

$formulaireModifContrats = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
	
$formulaireModifContrats->ajouterComposantLigne($formulaireModifContrats->creerLabel('Numéro du contrat :'));
$formulaireModifContrats->ajouterComposantTab();
$formulaireModifContrats->ajouterComposantLigne($formulaireModifContrats->creerInputTexte('idContrat', 'idContrat', '', 1, 'Entrez le numéro du contrat', ''));
$formulaireModifContrats->ajouterComposantTab();

$formulaireModifContrats->ajouterComposantLigne($formulaireModifContrats->creerLabel('Début du contrat:'));
$formulaireModifContrats->ajouterComposantTab();
$formulaireModifContrats->ajouterComposantLigne($formulaireModifContrats->creerInputTexte('dateDebut', 'dateDebut',  '',2, 'Entrez la date de début du contrat', ''));
$formulaireModifContrats->ajouterComposantTab();

$formulaireModifContrats->ajouterComposantLigne($formulaireModifContrats->creerLabel('Fin du contrat:'));
$formulaireModifContrats->ajouterComposantTab();
$formulaireModifContrats->ajouterComposantLigne($formulaireModifContrats->creerInputTexte('dateFin', 'dateFin',  '',3, 'Entrez la date de fin du contrat', ''));
$formulaireModifContrats->ajouterComposantTab();

$formulaireModifContrats->ajouterComposantLigne($formulaireModifContrats->creerLabel('Type du contrat:'));
$formulaireModifContrats->ajouterComposantTab();
$formulaireModifContrats->ajouterComposantLigne($formulaireModifContrats->creerInputTexte('typeContrat', 'typeContrat',  '',4, 'Entrez le type du contrat', ''));
$formulaireModifContrats->ajouterComposantTab();

$formulaireModifContrats->ajouterComposantLigne($formulaireModifContrats->creerLabel('Nombre heures:'));
$formulaireModifContrats->ajouterComposantTab();
$formulaireModifContrats->ajouterComposantLigne($formulaireModifContrats->creerInputTexte('nbHeures', 'nbHeures',  '',5, 'Entrez le nombre heures', ''));
$formulaireModifContrats->ajouterComposantTab();

$formulaireModifContrats->ajouterComposantLigne($formulaireModifContrats-> creerInputSubmit('submitModificationContrats', 'submitModificationContrats', 'Modification du contrat'));
$formulaireModifContrats->ajouterComposantTab();

$formulaireModifContrats->creerFormulaire();

//Supprimer un contrat

$formulaireSuprrContrats = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');

$formulaireSuprrContrats->ajouterComposantLigne($formulaireSuprrContrats->creerLabel('Numéro du contrat :'));
$formulaireSuprrContrats->ajouterComposantTab();
$formulaireSuprrContrats->ajouterComposantLigne($formulaireSuprrContrats->creerInputTexte('idContrat', 'idContrat', '', 1, 'Entrez le numéro du contrat', ''));
$formulaireSuprrContrats->ajouterComposantTab();

$formulaireSuprrContrats->ajouterComposantLigne($formulaireSuprrContrats-> creerInputSubmit('submitSupprimerContrats', 'submitSupprimerContrats', 'Supression du contrat'));
$formulaireSuprrContrats->ajouterComposantTab();

$formulaireSuprrContrats->creerFormulaire();

require_once "vue/vueGestionContrats.php";