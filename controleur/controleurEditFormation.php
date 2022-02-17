<?php

include_once 'modele/dao/FormationDAO.php';
include_once 'modele/dto/Formation.php';

//Permet de supprimer les valeurs dans la session formation
unset($_SESSION['formation']);
$formation = new Formation();
$formation->hydrate(FormationDAO::uneFormation($_GET['numForma']));
//Attribution de la formation  dans la valeur de session formation
$_SESSION['formation'] = serialize($formation);

require_once 'vue/vueEditFormation.php';
