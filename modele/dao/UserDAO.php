<?php

class UserDAO
{

    //Fonction renvoyant les informations d'un utilisateur
    public static function infoLogin($unLog){
        $resultat = DBConnex::getInstance()->prepare("
SELECT UTILISATEUR.idUser ,UTILISATEUR.nom, UTILISATEUR.prenom, UTILISATEUR.login, UTILISATEUR.statut, FONCTION.libelle, CLUB.nomClub, LIGUE.nomLigue
FROM  FONCTION, UTILISATEUR
LEFT JOIN CLUB ON UTILISATEUR.idClub = CLUB.idClub
LEFT JOIN LIGUE ON UTILISATEUR.idLigue = LIGUE.idLigue
WHERE UTILISATEUR.login = :login
AND UTILISATEUR.idFonc = FONCTION.idFonc;");
        $resultat->bindParam(':login', $unLog);
        $resultat->execute();
        return $resultat->fetch(PDO::FETCH_ASSOC);

    }

    //Fonction renvoyant les informations des utilisateur ayant postuler pour une formation
    public static function listeUtilisateurDemandeFormation($idForma){
        $resultat = DBConnex::getInstance()->prepare("SELECT UTILISATEUR.idUser ,UTILISATEUR.nom, UTILISATEUR.prenom, UTILISATEUR.login, UTILISATEUR.statut, FONCTION.libelle, CLUB.nomClub, LIGUE.nomLigue, DEMANDER.Status
FROM FONCTION, DEMANDER, UTILISATEUR
LEFT JOIN CLUB ON UTILISATEUR.idClub = CLUB.idClub
LEFT JOIN LIGUE ON UTILISATEUR.idLigue = LIGUE.idLigue
WHERE DEMANDER.idForma = :idForma
AND UTILISATEUR.idFonc = FONCTION.idFonc
AND UTILISATEUR.idUser = DEMANDER.idUser;");
        $resultat->bindParam(':idForma', $idForma);
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_ASSOC);
    }

    //Fonction renvoyant la liste des utilisateurs qui ont fait une demande pour une formation
    public static function listeDemandeUtilisateur(){
        $resultat = DBConnex::getInstance()->prepare("SELECT DISTINCT UTILISATEUR.idUser ,UTILISATEUR.nom, UTILISATEUR.prenom, UTILISATEUR.login, UTILISATEUR.statut, FONCTION.libelle, CLUB.nomClub, LIGUE.nomLigue
FROM FONCTION, DEMANDER, UTILISATEUR
LEFT JOIN CLUB ON UTILISATEUR.idClub = CLUB.idClub
LEFT JOIN LIGUE ON UTILISATEUR.idLigue = LIGUE.idLigue
WHERE DEMANDER.idUser = UTILISATEUR.idUser
AND UTILISATEUR.idFonc = FONCTION.idFonc
AND UTILISATEUR.idUser = DEMANDER.idUser;");
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_ASSOC);
    }

    //fonction permettant de retourner le contrat des utilisateurs
    public static function contrat($idUser){
        $resultat = DBConnex::getInstance()->prepare("SELECT * FROM `CONTRAT` where idUser = :idUser;");
        $resultat -> bindParam(':idUser', $idUser);
        $resultat->execute();
        $res = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    //fonction permettant de retourner les ligues
    public static function lesligues(){
        $resultat = DBConnex::getInstance()->prepare(
            "SELECT LIGUE.idLigue, LIGUE.nomLigue
        FROM `LIGUE`;");
        $resultat->execute();
        $res = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    //fonction permettant de retourner les ligues
    public static function lesclubs(){
        $resultat = DBConnex::getInstance()->prepare(
            "SELECT CLUB.idClub, CLUB.nomClub, CLUB.idLigue
        FROM `CLUB`;");
        $resultat->execute();
        $res = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    //fonction permettant de retourner les bulletins de salaire
    public static function bulletin($idUser){
        $resultat = DBConnex::getInstance()->prepare("SELECT BULLETIN.*
        FROM BULLETIN
        WHERE idContrat IN (SELECT idContrat
                             FROM CONTRAT
                             WHERE idUser IN (SELECT idUser
                                             FROM UTILISATEUR
                                             WHERE idUser = :idUser));");
        $resultat -> bindParam(':idUser', $idUser);
        $resultat->execute();
        $res = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    //GESTION DES SALARIES
    //fonction permettant de retourner tous les salariés
    public static function salarieUser(){
        $resultat = DBConnex::getInstance()->prepare(
            "SELECT UTILISATEUR.idUser, UTILISATEUR.nom, UTILISATEUR.prenom 
        FROM `UTILISATEUR` 
        WHERE UTILISATEUR.idFonc='4';");
        $resultat->execute();
        $res = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    //GESTION DES CONTRATS

    //fonction permettant de retourner tous les contrats
    public static function contratUser(){
        $resultat = DBConnex::getInstance()->prepare(
            "SELECT CONTRAT.idContrat, CONTRAT.dateDebut, CONTRAT.dateFin, CONTRAT.typeContrat, CONTRAT.nbHeures, CONTRAT.idUser, UTILISATEUR.nom, UTILISATEUR.prenom 
        FROM `CONTRAT`,`UTILISATEUR` 
        WHERE CONTRAT.idUser=UTILISATEUR.idUser 
        ORDER BY `CONTRAT`.`idUser` ASC ");
        $resultat->execute();
        $res = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    //fonction permettant de crée un contrat
    public static function creationContrat($dateDebut, $dateFin, $typeContrat, $nbHeures, $idUser){

        $requetePrepa = DBConnex::getInstance()->prepare(
            "INSERT INTO `CONTRAT` (`dateDebut`, `dateFin`, `typeContrat`, `nbHeures`, `idUser`) VALUES ('$dateDebut', '$dateFin', '$typeContrat', '$nbHeures', '$idUser');");
        $requetePrepa->bindParam(":dateDebut", $dateDebut);
        $requetePrepa->bindParam(":dateFin" , $dateFin);
        $requetePrepa->bindParam(":typeContrat" , $typeContrat);
        $requetePrepa->bindParam(":nbHeures", $nbHeures);
        $requetePrepa->bindParam(":idUser", $idUser);
        $requetePrepa->execute();
        $res = $requetePrepa->fetch();
        return $res;
    }

    //fonction permettant de modifier un contrat
    public static function modificationContrat($idContrat, $dateDebut, $dateFin, $typeContrat, $nbHeures, $idUser){

        $requetePrepa = DBConnex::getInstance()->prepare(
            "UPDATE `CONTRAT` SET `idContrat` = '$idContrat', `dateDebut` = '$dateDebut', `dateFin` = '$dateFin', `typeContrat` = '$typeContrat', `nbHeures` = '$nbHeures' WHERE `CONTRAT`.`idContrat` = $idContrat;");
        $requetePrepa->bindParam(":idContrat", $idContrat);
        $requetePrepa->bindParam(":dateDebut", $dateDebut);
        $requetePrepa->bindParam(":dateFin" , $dateFin);
        $requetePrepa->bindParam(":typeContrat" , $typeContrat);
        $requetePrepa->bindParam(":nbHeures", $nbHeures);
        $requetePrepa->bindParam(":idUser", $idUser);
        $requetePrepa->execute();
        $res = $requetePrepa->fetch();
        return $res;
    }

    //fonction permettant de supprimer un contrat
    public static function supressionContrat($idContrat){

        $requetePrepa = DBConnex::getInstance()->prepare(
            "DELETE FROM `CONTRAT` WHERE `CONTRAT`.`idContrat` = $idContrat;");
        $requetePrepa->bindParam(":idContrat", $idContrat);
        $requetePrepa->execute();
        $res = $requetePrepa->fetch();
        return $res;
    }


    //GESTION DES BULLETINS

    //fonction permettant de retourner tous les bulletins
    public static function bulletinUser($idUser){
        $resultat = DBConnex::getInstance()->prepare(
            "SELECT * FROM `BULLETIN`");
        $resultat->execute();
        $res = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    //fonction permettant de crée un bulletin
    public static function creationBulletin($mois, $annee, $bulletinPDF,$idContrat){

        $requetePrepa = DBConnex::getInstance()->prepare(
            "INSERT INTO `BULLETIN` (`mois`, `annee`, `bulletinPDF`, `idContrat`) VALUES ('$mois', '$annee', '$bulletinPDF', '$idContrat');");
        $requetePrepa->bindParam(":idBulletin", $idBulletin);
        $requetePrepa->bindParam(":mois", $mois);
        $requetePrepa->bindParam(":annee" , $annee);
        $requetePrepa->bindParam(":bulletinPDF" , $bulletinPDF);
        $requetePrepa->bindParam(":idContrat", $idContrat);
        $requetePrepa->execute();
        $res = $requetePrepa->fetch();
        return $res;
    }

    //fonction permettant de modifier un bulletin
    public static function modificationBulletin($idBulletin, $mois, $annee, $bulletinPDF,$idContrat){

        $requetePrepa = DBConnex::getInstance()->prepare(
            "UPDATE `BULLETIN` SET `idBulletin` = '$idBulletin', `mois` = '$mois', `annee` = '$annee', `bulletinPDF` = '$bulletinPDF', `idContrat` = '$idContrat' WHERE `BULLETIN`.`idBulletin` = $idBulletin;");
        $requetePrepa->bindParam(":idBulletin", $idBulletin);
        $requetePrepa->bindParam(":mois", $mois);
        $requetePrepa->bindParam(":annee" , $annee);
        $requetePrepa->bindParam(":bulletinPDF" , $bulletinPDF);
        $requetePrepa->bindParam(":idContrat", $idContrat);
        $requetePrepa->execute();
        $res = $requetePrepa->fetch();
        return $res;
    }

    //fonction permettant de supprimer un bulletin
    public static function supressionBulletin($idBulletin){

        $requetePrepa = DBConnex::getInstance()->prepare(
            "DELETE FROM `BULLETIN` WHERE `BULLETIN`.`idBulletin` = $idBulletin;");
        $requetePrepa->bindParam(":idBulletin", $idBulletin);
        $requetePrepa->execute();
        $res = $requetePrepa->fetch();
        return $res;
    }

    //GESTION DES COMPTES

    //fonction permettant de récupérer les salarié et bénévole
    public static function salarieBeneUser(){
        $resultat = DBConnex::getInstance()->prepare(
            "SELECT UTILISATEUR.idUser, UTILISATEUR.nom, UTILISATEUR.prenom, UTILISATEUR.login, UTILISATEUR.statut, UTILISATEUR.idFonc,UTILISATEUR.idLigue,UTILISATEUR.idClub 
        FROM `UTILISATEUR` 
        WHERE UTILISATEUR.idFonc='4'OR UTILISATEUR.idFonc='5';");
        $resultat->execute();
        $res = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    //fonction permettant de crée un compte
    public static function creationCompte($nom, $prenom, $login, $mdp, $statut, $idFonc, $idLigue, $idClub){

        $mdp = hash('sha256', $mdp);
        $requetePrepa = DBConnex::getInstance()->prepare(
            "INSERT INTO `UTILISATEUR` (`nom`, `prenom`, `login`, `mdp`,`statut`, `idFonc`, `idLigue`, `idClub`) VALUES ('$nom', '$prenom', '$login', '$mdp','$statut', '$idFonc', '$idLigue', '$idClub');");
        $requetePrepa->bindParam(":nom", $nom);
        $requetePrepa->bindParam(":prenom" , $prenom);
        $requetePrepa->bindParam(":login" , $login);
        $requetePrepa->bindParam(":mdp" , $mdp);
        $requetePrepa->bindParam(":statut", $statut);
        $requetePrepa->bindParam(":idFonc", $idFonc);
        $requetePrepa->bindParam(":idLigue", $idLigue);
        $requetePrepa->bindParam(":idClub", $idClub);
        $requetePrepa->execute();
        $res = $requetePrepa->fetch();
        return $res;
    }

    //fonction permettant de modifier un compte
    public static function modificationCompte($idUser, $nom, $prenom, $login, $mdp, $statut, $idFonc, $idLigue, $idClub){

        $mdp = hash('sha256', $mdp);
        $requetePrepa = DBConnex::getInstance()->prepare(
            "UPDATE `UTILISATEUR` SET `idUser` = '$idUser', `nom` = '$nom', `prenom` = '$prenom', `login` = '$login', `mdp` = '$mdp' , `statut` = '$statut' , `idFonc` = '$idFonc' , `idLigue` = '$idLigue' , `idClub` = '$idClub' WHERE `UTILISATEUR`.`idUser` = $idUser;");
        $requetePrepa->bindParam(":idUser", $idUser);
        $requetePrepa->bindParam(":nom", $nom);
        $requetePrepa->bindParam(":prenom" , $prenom);
        $requetePrepa->bindParam(":login" , $login);
        $requetePrepa->bindParam(":mdp" , $mdp);
        $requetePrepa->bindParam(":statut", $statut);
        $requetePrepa->bindParam(":idFonc", $idFonc);
        $requetePrepa->bindParam(":idLigue", $idLigue);
        $requetePrepa->bindParam(":idClub", $idClub);
        $requetePrepa->execute();
        $res = $requetePrepa->fetch();
        return $res;
    }

    //fonction permettant de supprimer un compte
    public static function supressionCompte($idUser){

        $requetePrepa = DBConnex::getInstance()->prepare(
            "DELETE FROM `UTILISATEUR` WHERE `UTILISATEUR`.`idUser` = $idUser;");
        $requetePrepa->bindParam(":idUser", $idUser);
        $requetePrepa->execute();
        $res = $requetePrepa->fetch();
        return $res;
    }

}