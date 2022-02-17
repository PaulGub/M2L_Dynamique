<?php
require_once 'modele/dao/FormationDAO.php';

//Récupération de l'identifiant de l'utilisateur et de la formation
$idUser = $_GET['idUser'];
$numForma = $_GET['numForma'];

//Vérification du nombre de place disponnible actuel
if(FormationDAO::calculNbPlaceForma($numForma) - 1 >= 0){
    $_SESSION['message'] = FormationDAO::accepterUtilisateurFormation($numForma, $idUser);
}
else{
    $_SESSION['message'] = "<div class=\"alert\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Attention !</strong> Cette formation a déjà trop de participant !
    </div>";
}

header('location: index.php?m2lMP=consulterDemandeUtilisateur&idUser=' . $idUser);