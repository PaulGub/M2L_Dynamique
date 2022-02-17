<?php

require_once 'modele/dao/FormationDAO.php';

//Récupération du numéro de formation
$numForma = $_GET['numForma'];
$_SESSION['message'] = FormationDAO::supprimerFormation($numForma);
header('location: index.php?m2lMP=gestionFormation');