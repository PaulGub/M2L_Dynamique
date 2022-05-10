<?php
include_once "lib/Affichage.php";
//formulaire création de bulletin

$formulaireCreaBulletins = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
	
$formulaireCreaBulletins->ajouterComposantLigne($formulaireCreaBulletins->creerLabel('Mois du bulletin:'));
$formulaireCreaBulletins->ajouterComposantTab();
$formulaireCreaBulletins->ajouterComposantLigne($formulaireCreaBulletins->creerInputTexte('mois', 'mois',  '',2, 'Entrez le mois du bulletin', ''));
$formulaireCreaBulletins->ajouterComposantTab();

$formulaireCreaBulletins->ajouterComposantLigne($formulaireCreaBulletins->creerLabel('Année du bulletin:'));
$formulaireCreaBulletins->ajouterComposantTab();
$formulaireCreaBulletins->ajouterComposantLigne($formulaireCreaBulletins->creerInputTexte('annee', 'annee',  '',3, 'Entrez annee du bulletin', ''));
$formulaireCreaBulletins->ajouterComposantTab();

$formulaireCreaBulletins->ajouterComposantLigne($formulaireCreaBulletins->creerLabel('Lien du bulletin:'));
$formulaireCreaBulletins->ajouterComposantTab();
$formulaireCreaBulletins->ajouterComposantLigne($formulaireCreaBulletins->creerInputTexte('bulletinPDF', 'bulletinPDF',  '',4, 'Entrez le lien du bulletin', ''));
$formulaireCreaBulletins->ajouterComposantTab();

$formulaireCreaBulletins->ajouterComposantLigne($formulaireCreaBulletins->creerLabel('Numéro contrat de travail:'));
$formulaireCreaBulletins->ajouterComposantTab();
$formulaireCreaBulletins->ajouterComposantLigne($formulaireCreaBulletins->creerInputTexte('idContrat', 'idContrat',  '',5, 'Entrez le numéro du contrat de travail', ''));
$formulaireCreaBulletins->ajouterComposantTab();

$formulaireCreaBulletins->ajouterComposantLigne($formulaireCreaBulletins-> creerInputSubmit('submitCréationBulletins', 'submitCréationBulletins', 'Création du bulletin'));
$formulaireCreaBulletins->ajouterComposantTab();

$formulaireCreaBulletins->creerFormulaire();

//formulaire modification de bulletins

$formulaireModifBulletins = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
	
$formulaireModifBulletins->ajouterComposantLigne($formulaireModifBulletins->creerLabel('Numéro du bulletin:'));
$formulaireModifBulletins->ajouterComposantTab();
$formulaireModifBulletins->ajouterComposantLigne($formulaireModifBulletins->creerInputTexte('idBulletin', 'idBulletin', '', 1, 'Entrez le numéro du bulletin', ''));
$formulaireModifBulletins->ajouterComposantTab();

$formulaireModifBulletins->ajouterComposantLigne($formulaireModifBulletins->creerLabel('Mois du bulletin:'));
$formulaireModifBulletins->ajouterComposantTab();
$formulaireModifBulletins->ajouterComposantLigne($formulaireModifBulletins->creerInputTexte('mois', 'mois',  '',2, 'Entrez le mois du bulletin', ''));
$formulaireModifBulletins->ajouterComposantTab();

$formulaireModifBulletins->ajouterComposantLigne($formulaireModifBulletins->creerLabel('Année du bulletin:'));
$formulaireModifBulletins->ajouterComposantTab();
$formulaireModifBulletins->ajouterComposantLigne($formulaireModifBulletins->creerInputTexte('annee', 'annee',  '',3, 'Entrez annee du bulletin', ''));
$formulaireModifBulletins->ajouterComposantTab();

$formulaireModifBulletins->ajouterComposantLigne($formulaireModifBulletins->creerLabel('Lien du bulletin:'));
$formulaireModifBulletins->ajouterComposantTab();
$formulaireModifBulletins->ajouterComposantLigne($formulaireModifBulletins->creerInputTexte('bulletinPDF', 'bulletinPDF',  '',4, 'Entrez le lien du bulletin', ''));
$formulaireModifBulletins->ajouterComposantTab();

$formulaireModifBulletins->ajouterComposantLigne($formulaireModifBulletins->creerLabel('Numéro contrat de travail:'));
$formulaireModifBulletins->ajouterComposantTab();
$formulaireModifBulletins->ajouterComposantLigne($formulaireModifBulletins->creerInputTexte('idContrat', 'idContrat',  '',5, 'Entrez le numéro du bulletin de travail', ''));
$formulaireModifBulletins->ajouterComposantTab();

$formulaireModifBulletins->ajouterComposantLigne($formulaireModifBulletins-> creerInputSubmit('submitModificationBulletins', 'submitModificationBulletins', 'Modification du bulletin'));
$formulaireModifBulletins->ajouterComposantTab();

$formulaireModifBulletins->creerFormulaire();

//Supprimer un bulletin

$formulaireSuprrBulletins = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');

$formulaireSuprrBulletins->ajouterComposantLigne($formulaireSuprrBulletins->creerLabel('Numéro du bulletin :'));
$formulaireSuprrBulletins->ajouterComposantTab();
$formulaireSuprrBulletins->ajouterComposantLigne($formulaireSuprrBulletins->creerInputTexte('idBulletin', 'idBulletin', '', 1, 'Entrez le numéro du bulletin', ''));
$formulaireSuprrBulletins->ajouterComposantTab();

$formulaireSuprrBulletins->ajouterComposantLigne($formulaireSuprrBulletins-> creerInputSubmit('submitSupprimerBulletins', 'submitSupprimerBulletins', 'Supression du bulletin'));
$formulaireSuprrBulletins->ajouterComposantTab();

$formulaireSuprrBulletins->creerFormulaire();

require_once "vue/vueGestionBulletins.php";