<?php

require_once "modele/dao/dBConnex.php";

class FormationDAO
{


    //Fonction permettant d'afficher les formations qui ont les inscriptions ouvertes
    public static function formationOuvertes($idUser){
        $resultat = DBConnex::getInstance()->prepare("
SELECT FORMATION.*
FROM FORMATION
WHERE FORMATION.dateClotureInscription >= CURRENT_DATE()
AND FORMATION.dateOuvertInscription <= CURRENT_DATE()
AND FORMATION.idForma NOT IN (
    SELECT DEMANDER.idForma
    FROM DEMANDER
    WHERE DEMANDER.idUser = :user);");
        $resultat -> bindParam(':user', $idUser);
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_ASSOC);
    }


    //Fonction permettant d'afficher toutes les formations, de la plus récente à la plus ancienne
    public static function toutesLesFormations(){
        $resultat = DBConnex::getInstance()->prepare("SELECT * FROM FORMATION ORDER BY FORMATION.idForma DESC;");
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_ASSOC);
    }


    //Fonction permettant à un utilisateur de postuler à une formation
    public static function postulerFormation($idForma, $idUser){
        $resultat = DBConnex::getInstance()->prepare("INSERT INTO `DEMANDER` (`idForma`, `idUser`, `Status`, `DateInscription`) VALUES (:idForma, :idUser, 'En Attente', CURRENT_DATE);");
        $resultat-> bindParam(':idForma', $idForma);
        $resultat-> bindParam(':idUser', $idUser);
        if($resultat->execute()) {
            return "<div class=\"success\">
        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
        <strong>Succès !</strong> Votre demande pour la formation a été envoyée !
        </div>";
        }
        else{
            return "<div class=\"alert\">
        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
        <strong>Erreur !</strong> Votre demande n'a pas pu être envoyée.
        </div>";
        }
    }


    //Fonction renvoyant les formations demandées par un utilisateur avec son Id en paramètre
    public static function formationsDemandees($idUser){
        $resultat = DBConnex::getInstance()->prepare("
SELECT FORMATION.*, DEMANDER.Status
FROM FORMATION, DEMANDER
WHERE DEMANDER.idUser = :idUser
AND FORMATION.idForma = DEMANDER.idForma;");
        $resultat -> bindParam(':idUser', $idUser);
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_ASSOC);
    }


    //Fonction permettant de supprimer la demande d'une formation pour un utilisateur
    public static function supprimerDemandeFormation($idForma, $idUser){
        $resultat = DBConnex::getInstance()->prepare("DELETE FROM DEMANDER
WHERE DEMANDER.idForma = :idForma
AND DEMANDER.idUser = :idUser;");
        $resultat-> bindParam(':idUser', $idUser);
        $resultat-> bindParam(':idForma', $idForma);
        if($resultat->execute()) {
            return "<div class=\"success\">
        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
        <strong>Succès !</strong> Votre demande a été supprimée !
        </div>";
        }
        else{
            return "<div class=\"alert\">
        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
        <strong>Erreur !</strong> Votre demande n'a pas pu être supprimée !
        </div>";
        }
    }


    //Fonction permettant de vérifier la cohérance des dates du début / fin d'inscription et début / fin de la formation
    public static function verifDateForm($dateDebInscription, $dateFinInscription, $dateDebForm, $dateFinForm){
        $DI = new DateTime($dateDebInscription);
        $FI = new DateTime($dateFinInscription);
        $DF = new DateTime($dateDebForm);
        $FF = new DateTime($dateFinForm);
        if($DI <= $FI && $DI < $DF && $DI < $FF) {
            if($FI < $DF && $FI < $FF){
                if($DF <= $FF){
                    return true;
                }
                else{
                    $_SESSION['message'] = "<div class=\"alert\">
        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
        <strong>Erreur !</strong> La date de début de formation ne peut avoir lieu après la fin de la formation !
        </div>";
                    return false;
                }
            }
            else{
                $_SESSION['message'] =  "<div class=\"alert\">
        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
        <strong>Erreur !</strong> La date de fin d'inscription ne peut pas avoir lieu après le début / fin de la formation !
        </div>";
                return false;
            }
        }
        else{
            $_SESSION['message'] =  "<div class=\"alert\">
        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
        <strong>Erreur !</strong> La date de début d'inscription ne peut pas avoir lieu après la date de clotûre d'inscription ou de début / fin de formation !
        </div>";
            return false;
        }
    }


    //Fonction permattant d'ajouter une formation
    public static function ajoutFormation($nomForm, $descForm, $dureeForm, $dateDebInscription, $dateFinInscription, $dateDebForm, $dateFinForm, $nbMaxForm){

        //Si le nombre de personne max est nul ou négatif
        if($nbMaxForm <= 0){
            return "<div class=\"alert\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Erreur !</strong> Votre formation n'a pas pu être ajoutée ! Il doit y avoir au moins une place maximum !
    </div>";
        }

        $resultat = DBConnex::getInstance()->prepare("INSERT INTO `FORMATION` (`idForma`, `intitule`, `descriptif`, `duree`, `dateOuvertInscription`, `dateClotureInscription`, `dateDebutFormation`, `dateFinFormation`, `nbMaxInscription`) 
VALUES (NULL, :nomForm, :descForm, :dureeForm, :dateDebI, :dateFinI, :dateDebF, :dateFinF, :nbMax);");
        $resultat -> bindParam(':nomForm', $nomForm);
        $resultat -> bindParam(':descForm', $descForm);
        $resultat -> bindParam(':dureeForm', $dureeForm);
        $resultat -> bindParam(':dateDebI', $dateDebInscription);
        $resultat -> bindParam(':dateFinI', $dateFinInscription);
        $resultat -> bindParam(':dateDebF', $dateDebForm);
        $resultat -> bindParam(':dateFinF', $dateFinForm);
        $resultat -> bindParam(':nbMax', $nbMaxForm);
        if($resultat->execute()) {
            return "<div class=\"success\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Succès !</strong> La formation a été créée !
    </div>";
        }
        else{
            return "<div class=\"alert\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Erreur !</strong> Votre formation n'a pas pu être créée !
    </div>";
        }
    }


    //Fonction renvoyant une formation avec l'id de la formation passé en paramètre
    public static function uneFormation($idForma){
        $resultat = DBConnex::getInstance()->prepare("SELECT * 
FROM FORMATION
WHERE idForma = :idForma;");
        $resultat->bindParam(':idForma', $idForma);
        $resultat->execute();
        return $resultat->fetch(PDO::FETCH_ASSOC);
    }

    //Fonction permettant de modifier une formation
    public static function modifFormation($idForma, $nomForm, $descForm, $dureeForm, $dateDebInscription, $dateFinInscription, $dateDebForm, $dateFinForm, $nbMaxForm){

        //Si le nombre de personne max est nul ou négatif
        if($nbMaxForm <= 0){
            return "<div class=\"alert\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Erreur !</strong> Votre formation n'a pas pu être modifiée ! Il doit y avoir au moins une place maximum !
    </div>";
        }

        $resultat = DBConnex::getInstance()->prepare("UPDATE `FORMATION` SET 
                       `intitule` = :nomForm, 
                       `descriptif` = :descForm, 
                       `duree` = :dureeForm, 
                       `dateOuvertInscription` = :dateDebI, 
                       `dateClotureInscription` = :dateFinI, 
                       `dateDebutFormation` = :dateDebF, 
                       `dateFinFormation` = :dateFinF, 
                       `nbMaxInscription` = :nbMax 
WHERE `FORMATION`.`idForma` = :idForma;");
        $resultat -> bindParam(':nomForm', $nomForm);
        $resultat -> bindParam(':descForm', $descForm);
        $resultat -> bindParam(':dureeForm', $dureeForm);
        $resultat -> bindParam(':dateDebI', $dateDebInscription);
        $resultat -> bindParam(':dateFinI', $dateFinInscription);
        $resultat -> bindParam(':dateDebF', $dateDebForm);
        $resultat -> bindParam(':dateFinF', $dateFinForm);
        $resultat -> bindParam(':nbMax', $nbMaxForm);
        $resultat-> bindParam(':idForma', $idForma);
        if($resultat->execute()) {
            return "<div class=\"success\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Succès !</strong> La formation a été modifiée !
    </div>";
        }
        else{
            return "<div class=\"alert\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Erreur !</strong> Votre formation n'a pas pu être modifiée !
    </div>";
        }
    }

    //Fonction permettant de supprimer une formation
    public static function supprimerFormation($idForma){
        $resultat = DBConnex::getInstance()->prepare("DELETE FROM `DEMANDER` WHERE idForma = :idForma");
        $resultat-> bindParam(':idForma', $idForma);
        $resultat-> execute();
        $resultat = DBConnex::getInstance()->prepare("DELETE FROM `FORMATION` WHERE idForma = :idForma");
        $resultat-> bindParam(':idForma', $idForma);
        if($resultat->execute()) {
            return "<div class=\"success\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Succès !</strong> La formation a été supprimée !
    </div>";
        }
        else{
            return "<div class=\"alert\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Erreur !</strong> Votre formation n'a pas pu être supprimée !
    </div>";
        }
    }


    //Fonction permettant de savoir si la modification de l'état des demandes est possible pour une formation
    public static function modifierEtatDemande($idForma){
        $resultat = DBConnex::getInstance()->prepare("SELECT dateClotureInscription, dateDebutFormation, dateFinFormation
FROM FORMATION
WHERE idForma = :idForma;");
        $resultat-> bindParam(':idForma', $idForma);
        $resultat-> execute();
        $resultat = $resultat->fetch(PDO::FETCH_ASSOC);
        $dateActuelle = new DateTime("now");
        $dateClotInscription = new DateTime($resultat['dateClotureInscription']);
        $dateDebFormation = new DateTime($resultat['dateDebutFormation']);

        if($dateClotInscription >= $dateActuelle->modify('+1 day')){
            $_SESSION["etatModif"] = "Les inscriptions pour cette formation ne sont pas encore ouvertes ou le sont actuellement ! Vous ne pouvez pas encore modifier les demandes.";
            return false;
        }
        elseif($dateActuelle >= $dateDebFormation){
            $_SESSION["etatModif"] = "Cette formation a déjà commencée ou est terminée ! Vous ne pouvez pas modifier les demandes.";
            return false;
        }
        else{
            $_SESSION["etatModif"] = "Vous pouvez modifier les demandes !";
            return true;
        }
    }


    //Fonction qui calcul le nombre de place restante pour une formation
    public static function calculNbPlaceForma($idForma){
        $resultat = DBConnex::getInstance()->prepare("SELECT FORMATION.nbMaxInscription
FROM FORMATION
WHERE FORMATION.idForma = :idForma;");
        $resultat-> bindParam(':idForma', $idForma);
        $resultat-> execute();
		$nbMax = $resultat->fetch(PDO::FETCH_NUM);
		
		$resultat = DBConnex::getInstance()->prepare("SELECT COUNT(DEMANDER.idForma)
FROM FORMATION, DEMANDER 
WHERE DEMANDER.idForma = :idForma
AND DEMANDER.Status = 'Acceptée'
AND FORMATION.idForma = DEMANDER.idForma;");
        $resultat-> bindParam(':idForma', $idForma);
        $resultat-> execute();
        $nbActuel = $resultat->fetch(PDO::FETCH_NUM);
		
        return $nbMax[0] - $nbActuel[0];
    }


    //Fonction permettant de modifier l'état d'un utilisateur pour une formation et de l'accepter
    public static function accepterUtilisateurFormation($idForma, $idUser){
        $resultat = DBConnex::getInstance()->prepare("UPDATE `DEMANDER` SET `Status` = 'Acceptée' WHERE `DEMANDER`.`idForma` = :idForma AND `DEMANDER`.`idUser` = :idUser;");
        $resultat-> bindParam(':idForma', $idForma);
        $resultat-> bindParam(':idUser', $idUser);
        if($resultat->execute()){
            return "<div class=\"success\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Succès !</strong> L'utilisateur a été accepté pour cette formation !
    </div>";
        }
        else{
            return "<div class=\"alert\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Attention !</strong> L'utilisateur n'a pas pu être ajouté pour cette formation !
    </div>";
        }
    }


    //Fonction permettant de modifier l'état d'un utilisateur pour une formation et de le mettre en attente
    public static function metteEnAttenteUtilisateurFormation($idForma, $idUser){
        $resultat = DBConnex::getInstance()->prepare("UPDATE `DEMANDER` SET `Status` = 'En Attente' WHERE `DEMANDER`.`idForma` = :idForma AND `DEMANDER`.`idUser` = :idUser;");
        $resultat-> bindParam(':idForma', $idForma);
        $resultat-> bindParam(':idUser', $idUser);
        if($resultat->execute()){
            return "<div class=\"success\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Succès !</strong> L'utilisateur a été mis en attente pour cette formation !
    </div>";
        }
        else{
            return "<div class=\"alert\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Attention !</strong> L'utilisateur n'a pas pu être mis en attente pour cette formation !
    </div>";
        }
    }

    //Fonction permettant de modifier l'état d'un utilisateur pour une formation et de le refuser
    public static function refuserUtilisateurFormation($idForma, $idUser){
        $resultat = DBConnex::getInstance()->prepare("UPDATE `DEMANDER` SET `Status` = 'Refusée' WHERE `DEMANDER`.`idForma` = :idForma AND `DEMANDER`.`idUser` = :idUser;");
        $resultat-> bindParam(':idForma', $idForma);
        $resultat-> bindParam(':idUser', $idUser);
        if($resultat->execute()){
            return "<div class=\"success\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Succès !</strong> L'utilisateur a été refusé pour cette formation !
    </div>";
        }
        else{
            return "<div class=\"alert\">
    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
    <strong>Attention !</strong> L'utilisateur n'a pas pu être refusé pour cette formation !
    </div>";
        }
    }


}