<?php

include_once 'modele/dao/FormationDAO.php';

//Vérification des valeurs envoyées
if(isset($_POST['nomForm']) && isset($_POST['descForm']) && isset($_POST['dureeForm']) && isset($_POST['dateDebInscription']) && isset($_POST['dateFinInscription']) && isset($_POST['dateDebFormation']) && isset($_POST['dateFinFormation']) && isset($_POST['nbMaxForm'])){
    //Attribution des valeurs du formulaire à des variables
    $nomForm = $_POST['nomForm'];
    $descForm = $_POST['descForm'];
    $dureeForm = $_POST['dureeForm'];
    $dateDebInscription = $_POST['dateDebInscription'];
    $dateFinInscription = $_POST['dateFinInscription'];
    $dateDebForm = $_POST['dateDebFormation'];
    $dateFinForm = $_POST['dateFinFormation'];
    $nbMaxForm = $_POST['nbMaxForm'];

    //Vérification de la cohérence des dates du début et fin d'inscription de la formation et de la date de commencement et de fin de la formation
    if(FormationDAO::verifDateForm($dateDebInscription, $dateFinInscription, $dateDebForm, $dateFinForm)){
        $_SESSION['message'] = FormationDAO::ajoutFormation($nomForm, $descForm, $dureeForm, $dateDebInscription, $dateFinInscription, $dateDebForm, $dateFinForm, $nbMaxForm);
    }

    header('location: index.php?m2lMP=gestionFormation');
}