<?php

include_once 'modele/dao/FormationDAO.php';

//Récupération de l'objet utilisateur dans la variable de session identification
$unUser = unserialize($_SESSION['identification']);
$_SESSION['message'] = FormationDAO::supprimerDemandeFormation($_GET['numForma'], $unUser->getIdUser());
header('location: index.php?m2lMP=demandeFormation');