<?php
require_once 'modele/dao/FormationDAO.php';

//Récupération de l'identifiant de l'utilisateur et de la formation
$idUser = $_GET['idUser'];
$numForma = $_GET['numForma'];

$_SESSION['message'] = FormationDAO::refuserUtilisateurFormation($numForma, $idUser);

header('location: index.php?m2lMP=consulterFormation&numForma=' . $numForma);