<?php

require_once 'modele/dao/FormationDAO.php';

//Récupération de l'objet utilisateur depuis la variable de session identification
$unUser = unserialize($_SESSION['identification']);

//Envoie de la demande de postulation pour effectuer la demande à la formation
$_SESSION['message'] = FormationDAO::postulerFormation($_GET['numForma'], $unUser->getIdUser());
header('location: index.php?m2lMP=listeFormation');