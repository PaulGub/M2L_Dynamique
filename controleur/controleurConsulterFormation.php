<?php

require_once 'modele/dao/FormationDAO.php';

//Permet d'éviter d'afficher deux fois le même message
$_SESSION["message"] = NULL;

//Permet d'afficher le gérant des formations sur la modification des formations
FormationDAO::modifierEtatDemande($_GET['numForma']);


require_once 'vue/vueConsulterFormation.php';