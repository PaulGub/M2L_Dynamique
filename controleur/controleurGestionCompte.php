<?php
include_once "lib/Affichage.php";
//formulaire création du compte

$formulaireCreaCompte = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
	
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerLabel('Numéro du compte :'));
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerLabel('Attention ne fonctionne pas avec certaines valeurs, par exemple 5[problème base de donées]'));
$formulaireCreaCompte->ajouterComposantTab();
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerInputTexte('idUser', 'idUser', '', 1, 'Entrez le numéro du compte', ''));
$formulaireCreaCompte->ajouterComposantTab();

$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerLabel('Nom du compte:'));
$formulaireCreaCompte->ajouterComposantTab();
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerInputTexte('nom', 'nom',  '',2, 'Entrez le nom du compte', ''));
$formulaireCreaCompte->ajouterComposantTab();

$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerLabel('Prénom du compte:'));
$formulaireCreaCompte->ajouterComposantTab();
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerInputTexte('prenom', 'prenom',  '',3, 'Entrez le prenom du compte', ''));
$formulaireCreaCompte->ajouterComposantTab();

$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerLabel('Identifiant du compte:'));
$formulaireCreaCompte->ajouterComposantTab();
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerInputTexte('login', 'login',  '',4, 'Entrez identifiant du compte', ''));
$formulaireCreaCompte->ajouterComposantTab();

$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerLabel('Mot de passe du compte:'));
$formulaireCreaCompte->ajouterComposantTab();
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerInputMdp('mdp', 'mdp',  1, 'Entrez votre mot de passe', ''));
$formulaireCreaCompte->ajouterComposantTab();

$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerLabel('Statut du compte:'));
$formulaireCreaCompte->ajouterComposantTab();
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerInputTexte('statut', 'statut',  '',5, 'Entrez le statut du compte', ''));
$formulaireCreaCompte->ajouterComposantTab();

$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerLabel('Identifiant de la fonction:'));
$formulaireCreaCompte->ajouterComposantTab();
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerInputTexte('idFonc', 'idFonc',  '',6, 'Entrez identifiant de la fonction', ''));
$formulaireCreaCompte->ajouterComposantTab();

$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerLabel('Identifiant de la ligue:'));
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerLabel('Attention ne fonctionne que avec la valeur 1 [problème base de donées]'));
$formulaireCreaCompte->ajouterComposantTab();
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerInputTexte('idLigue', 'idLigue',  '',7, 'Entrez identifiant de la ligue', ''));
$formulaireCreaCompte->ajouterComposantTab();

$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerLabel('Identifiant du club:'));
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerLabel('Attention ne fonctionne que avec la valeur 1 [problème base de donées]'));
$formulaireCreaCompte->ajouterComposantTab();
$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte->creerInputTexte('idClub', 'idClub',  '',8, 'Entrez identifiant du club', ''));
$formulaireCreaCompte->ajouterComposantTab();

$formulaireCreaCompte->ajouterComposantLigne($formulaireCreaCompte-> creerInputSubmit('submitCréationCompte', 'submitCréationCompte', 'Création du compte'));
$formulaireCreaCompte->ajouterComposantTab();

$formulaireCreaCompte->creerFormulaire();

//formulaire modification du compte

$formulaireModifCompte = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
	
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Ancien numéro de compte :'));
$formulaireModifCompte->ajouterComposantTab();
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('ancidUser', 'ancidUser', '', 1, 'Entrez ancien numéro du compte', ''));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Numéro du compte :'));
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Attention ne fonctionne pas avec certaines valeurs, par exemple 5[problème base de donées]'));
$formulaireModifCompte->ajouterComposantTab();
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('idUser', 'idUser', '', 1, 'Entrez le numéro du compte', ''));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Nom du compte:'));
$formulaireModifCompte->ajouterComposantTab();
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('nom', 'nom',  '',2, 'Entrez le nom du compte', ''));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Prénom du compte:'));
$formulaireModifCompte->ajouterComposantTab();
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('prenom', 'prenom',  '',3, 'Entrez le prenom du compte', ''));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Identifiant du compte:'));
$formulaireModifCompte->ajouterComposantTab();
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('login', 'login',  '',4, 'Entrez identifiant du compte', ''));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Mot de passe du compte:'));
$formulaireModifCompte->ajouterComposantTab();
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputMdp('mdp', 'mdp',  1, 'Entrez votre mot de passe', ''));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Statut du compte:'));
$formulaireModifCompte->ajouterComposantTab();
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('statut', 'statut',  '',5, 'Entrez le statut du compte', ''));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Identifiant de la fonction:'));
$formulaireModifCompte->ajouterComposantTab();
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('idFonc', 'idFonc',  '',6, 'Entrez identifiant de la fonction', ''));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Identifiant de la ligue:'));
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Attention ne fonctionne que avec la valeur 1 [problème base de donées]'));
$formulaireModifCompte->ajouterComposantTab();
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('idLigue', 'idLigue',  '',7, 'Entrez identifiant de la ligue', ''));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Identifiant du club:'));
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Attention ne fonctionne que avec la valeur 1 [problème base de donées]'));
$formulaireModifCompte->ajouterComposantTab();
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('idClub', 'idClub',  '',8, 'Entrez identifiant du club', ''));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte-> creerInputSubmit('submitModificationCompte', 'submitModificationCompte', 'Modification du compte'));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->creerFormulaire();

//Supprimer un contrat

$formulaireSuprrCompte = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');

$formulaireSuprrCompte->ajouterComposantLigne($formulaireSuprrCompte->creerLabel('Numéro du compte :'));
$formulaireSuprrCompte->ajouterComposantTab();
$formulaireSuprrCompte->ajouterComposantLigne($formulaireSuprrCompte->creerInputTexte('idUser', 'idUser', '', 1, 'Entrez le numéro du compte', ''));
$formulaireSuprrCompte->ajouterComposantTab();

$formulaireSuprrCompte->ajouterComposantLigne($formulaireSuprrCompte-> creerInputSubmit('submitSupprimerCompte', 'submitSupprimerCompte', 'Supression du compte'));
$formulaireSuprrCompte->ajouterComposantTab();

$formulaireSuprrCompte->creerFormulaire();

require_once "vue/vueGestionCompte.php";