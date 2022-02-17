<?php
require_once 'modele/dao/FormationDAO.php';
class Affichage
{

    //fonction pour afficher un array à deux dimensions en HTML
    public static function transforTab($unTab){
        foreach ($unTab as $ligne){
            echo "<tr>";
            foreach ($ligne as $cellule) {
                echo "<td style=\"border: 1px solid black;padding: 0.5em;text-align: center;\">" . $cellule . "</td>";
            }
            echo "</tr>";
        }
    }

    //fonction pour le tableau des bulletins de salaire
    public static function transforTabSalaire($unTab){
        foreach ($unTab as $ligne){

            echo "<tr>";
            foreach ($ligne as $key => $cellule) {
                if($key == 'bulletinPDF'){
                    echo "<td style=\"border: 1px solid black;padding: 0.5em;text-align: center;\"><a href=\"" . $cellule . ".pdf\">" . $cellule .   "</a></td>";
                }
                else{
                    echo "<td style=\"border: 1px solid black;padding: 0.5em;text-align: center;\">" . $cellule . "</td>";
                }

            }
            echo "</tr>";
        }
    }

    //fonction pour afficher les header d'un tableau
    public static function headerTab($unTab){
        foreach (array_keys($unTab) as $unHeader){
            echo "<th>" . $unHeader . "</th>";
        }
    }

    //fonction pour afficher les formations ouvertes
    public static function transforTabFormationsOuvertes($unTab, $consultation){
        echo "<th>Intitulé de la formation</th>";
        echo "<th>Descriptif de la formation</th>";
        echo "<th>Durée de la formation</th>";
        echo "<th>Date d'ouverture des inscriptions</th>";
        echo "<th>Date de clôture des inscriptions</th>";
        echo "<th>Date de début de formation</th>";
        echo "<th>Date de fin de formation</th>";
        echo "<th>Nombre de places disponnibles</th>";
        if($consultation){
            echo "<th>Consulter</th>";
        }
        else{
            echo "<th>Postuler</th>";
        }
        foreach ($unTab as $ligne){
            echo "<tr>";
            $unCode = false;
            $formID = 0;
            $ligne['duree'] = $ligne['duree'] . "h";
            foreach ($ligne as $cellule) {
                if($unCode){
                        echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center;\">" . $cellule . "</td>";
                }
                else{
                    $formID = $cellule;
                    $unCode = true;
                }
            }
            if($consultation){
                echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=consulterFormation&numForma=$formID\">
      <img src=\"images/consulter.svg\" alt=\"Postuler\" style=\"height: 38px; width: 42px;\"> </a> </td>";
            }
            else{
                echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=postulerFormation&numForma=$formID\">
      <img src=\"images/postuler.svg\" alt=\"Postuler\" style=\"height: 38px; width: 42px;\"> </a> </td>";
            }
            echo "</tr>";
        }
    }


    //Fonction permettant d'afficher les formations demandées par un utilisateur dans un tableau
    public static function transforTabFormationsDemandee($unTab){
        echo "<th>Intitulé de la formation</th>";
        echo "<th>Descriptif de la formation</th>";
        echo "<th>Durée de la formation</th>";
        echo "<th>Date d'ouverture des inscriptions</th>";
        echo "<th>Date de clôture des inscriptions</th>";
        echo "<th>Date de début de formation</th>";
        echo "<th>Date de fin de formation</th>";
        echo "<th>Nombre de places disponnibles</th>";
        echo "<th>Status de la demande</th>";
        echo "<th>Supprimer la demande</th>";

        foreach ($unTab as $ligne){
            echo "<tr>";
            $unCode = false;
            $formID = 0;
            $ligne['duree'] = $ligne['duree'] . "h";
            $unStatus = $ligne['Status'];
            unset($ligne['Status']);

            foreach ($ligne as $cellule) {
                if($unCode){
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center;\">" . $cellule . "</td>";
                }
                else{
                    $formID = $cellule;
                    $unCode = true;
                }
            }

            switch ($unStatus){
                case "En Attente":
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center; color: orange; font-weight: bold;\">" . $unStatus . "</td>";
                    break;
                case "Acceptée":
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center; color: green; font-weight: bold;\">" . $unStatus . "</td>";
                    break;
                case "Refusée":
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center; color: red; font-weight: bold;\">" . $unStatus . "</td>";
                    break;
            }

            echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=supprimerDemandeFormation&numForma=$formID\">
      <img src=\"images/poubelle.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a> </td>";
            echo "</tr>";
        }
    }


    //Fonction permettant d'afficher les utilisateurs dans un tableau qui ont demandés une formation
    public static function transforTabDemandeUtilisateur($unTab, $idForma){
        echo "<th>Nom</th>";
        echo "<th>Prénom</th>";
        echo "<th>Login</th>";
        echo "<th>Statut</th>";
        echo "<th>Fonction</th>";
        echo "<th>Club</th>";
        echo "<th>Ligue</th>";
        echo "<th>Etat actuel</th>";
        $modif = false;

        //Si la modification des demandes est possible
        if(FormationDAO::modifierEtatDemande($idForma)) {
            echo "<th>Accepter</th>";
            echo "<th>Mette en attente</th>";
            echo "<th>Refuser</th>";
            $modif = true;
        }

        foreach ($unTab as $ligne){
            echo "<tr>";
            $unCode = false;
            $formID = 0;
            $unStatus = $ligne['Status'];
            unset($ligne['Status']);
            if($ligne['nomClub'] == NULL){
                $ligne['nomClub'] = "X";
            }
            else{
                $ligne['nomLigue'] = "X";
            }

            foreach ($ligne as $cellule) {
                if($unCode){
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center;\">" . $cellule . "</td>";
                }
                else{
                    $formID = $cellule;
                    $unCode = true;
                }
            }

            switch ($unStatus){
                case "En Attente":
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center; color: orange; font-weight: bold;\">" . $unStatus . "</td>";
                    break;
                case "Acceptée":
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center; color: green; font-weight: bold;\">" . $unStatus . "</td>";
                    break;
                case "Refusée":
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center; color: red; font-weight: bold;\">" . $unStatus . "</td>";
                    break;
            }

            //Si les demandes des utilisateurs sont modifiables
            if($modif){

                //Ajuste les boutons du tableau en fonction de l'état de la demande de l'utilisateur
                if($unStatus == "Acceptée"){
                    //Ajouter
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">X</td>";

                    //Mettre en attente
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=attenteDemandeFormation&idUser=$formID&numForma=" . $_GET['numForma']. "\">
      <img src=\"images/wait.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";

                    //Refuser
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=refuserDemandeFormation&idUser=$formID&numForma=" . $_GET['numForma']. "\">
      <img src=\"images/refuse.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";
                }
                elseif ($unStatus == "En Attente"){
                    //Ajouter
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=ajouterDemandeFormation&idUser=$formID&numForma=" . $_GET['numForma']. "\">
      <img src=\"images/add.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";

                    //Mettre en attente
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">X</td>";

                    //Refuser
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=refuserDemandeFormation&idUser=$formID&numForma=" . $_GET['numForma']. "\">
      <img src=\"images/refuse.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";
                }
                else{
                    //Ajouter
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=ajouterDemandeFormation&idUser=$formID&numForma=" . $_GET['numForma']. "\">
      <img src=\"images/add.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";

                    //Mettre en attente
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=attenteDemandeFormation&idUser=$formID&numForma=" . $_GET['numForma']. "\">
      <img src=\"images/wait.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";

                    //Refuser
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">X</td>";

                }
            }
            echo "</tr>";
        }
    }

    //Affiche les utilisateurs dans un tableau qui ont formulés des demandes pour une / plusieurs formations
    public static function transforTabUtilisateurDemande($unTab){
        echo "<th>Nom</th>";
        echo "<th>Prénom</th>";
        echo "<th>Login</th>";
        echo "<th>Statut</th>";
        echo "<th>Fonction</th>";
        echo "<th>Club</th>";
        echo "<th>Ligue</th>";
        echo "<th>Consulter</th>";
        foreach ($unTab as $ligne){
            echo "<tr>";
            $unCode = false;
            $formID = 0;
            if($ligne['nomClub'] == NULL){
                $ligne['nomClub'] = "X";
            }
            else{
                $ligne['nomLigue'] = "X";
            }
            foreach ($ligne as $cellule) {
                if($unCode){
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center;\">" . $cellule . "</td>";
                }
                else{
                    $formID = $cellule;
                    $unCode = true;
                }
            }


            //Consulter
            echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=consulterDemandeUtilisateur&idUser=$formID\">
      <img src=\"images/consulter.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";
        }
    }

    //Affiche les formations demandées par un utilisateur
    public static function transforTabFormationsUtilisateur($unTab){
        echo "<th>Intitulé de la formation</th>";
        echo "<th>Descriptif de la formation</th>";
        echo "<th>Durée de la formation</th>";
        echo "<th>Date d'ouverture des inscriptions</th>";
        echo "<th>Date de clôture des inscriptions</th>";
        echo "<th>Date de début de formation</th>";
        echo "<th>Date de fin de formation</th>";
        echo "<th>Nombre de places disponnibles</th>";
        echo "<th>Etat actuel</th>";
        echo "<th>Accepter</th>";
        echo "<th>Mette en attente</th>";
        echo "<th>Refuser</th>";
        foreach ($unTab as $ligne){
            echo "<tr>";
            $unCode = false;
            $formID = 0;
            $ligne['duree'] = $ligne['duree'] . "h";
            $unStatus = $ligne['Status'];
            unset($ligne['Status']);

            foreach ($ligne as $cellule) {
                if($unCode){
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center;\">" . $cellule . "</td>";
                }
                else{
                    $formID = $cellule;
                    $unCode = true;
                }
            }
            switch ($unStatus){
                case "En Attente":
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center; color: orange; font-weight: bold;\">" . $unStatus . "</td>";
                    break;
                case "Acceptée":
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center; color: green; font-weight: bold;\">" . $unStatus . "</td>";
                    break;
                case "Refusée":
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center; color: red; font-weight: bold;\">" . $unStatus . "</td>";
                    break;
            }

            //Si les modification pour une formation est possible alors les boutons sont montrés
            if(FormationDAO::modifierEtatDemande($formID)) {

                //Adapte l'affichage des boutons en fonction de l'état actuel de la demande de l'utilisateur

                if($unStatus == "Acceptée"){
                    //Ajouter
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">X</td>";

                    //Mettre en attente
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=AttenteDemandeFormationConsultation&numForma=$formID&idUser=" . $_GET['idUser']. "\">
      <img src=\"images/wait.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";

                    //Refuser
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=RefuserDemandeFormationConsultation&numForma=$formID&idUser=" . $_GET['idUser']. "\">
      <img src=\"images/refuse.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";
                }
                elseif ($unStatus == "En Attente"){
                    //Ajouter
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=AjouterDemandeFormationConsultation&numForma=$formID&idUser=" . $_GET['idUser']. "\">
      <img src=\"images/add.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";

                    //Mettre en attente
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">X</td>";

                    //Refuser
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=RefuserDemandeFormationConsultation&numForma=$formID&idUser=" . $_GET['idUser']. "\">
      <img src=\"images/refuse.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";
                }
                else{
                    //Ajouter
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=AjouterDemandeFormationConsultation&numForma=$formID&idUser=" . $_GET['idUser']. "\">
      <img src=\"images/add.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";

                    //Mettre en attente
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=AttenteDemandeFormationConsultation&numForma=$formID&idUser=" . $_GET['idUser']. "\">
      <img src=\"images/wait.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";

                    //Refuser
                    echo "<td style=\"border-left: solid 1px black; text-align: center;\">X</td>";
                }
            }
            //Si la modification de l'état de l'utilisateur pour la formation n'est pas possible alors ne pas montrer les boutons
            else{
                echo "<td style=\"border-left: solid 1px black; text-align: center;\">X</td>";
                echo "<td style=\"border-left: solid 1px black; text-align: center;\">X</td>";
                echo "<td style=\"border-left: solid 1px black; text-align: center;\">X</td>";
            }
            echo "</tr>";

        }
    }

    //Affiche toutes les formations et permet de les modifier ou de les supprimer
    public static function transforTabFormations($unTab){
        echo "<th>Intitulé de la formation</th>";
        echo "<th>Descriptif de la formation</th>";
        echo "<th>Durée de la formation</th>";
        echo "<th>Date d'ouverture des inscriptions</th>";
        echo "<th>Date de clôture des inscriptions</th>";
        echo "<th>Date de début de formation</th>";
        echo "<th>Date de fin de formation</th>";
        echo "<th>Nombre de places disponnibles</th>";
        echo "<th>Modifier</th>";
        echo "<th>Supprimer</th>";
        foreach ($unTab as $ligne){
            echo "<tr>";
            $unCode = false;
            $formID = 0;
            $ligne['duree'] = $ligne['duree'] . "h";
            foreach ($ligne as $cellule) {
                if($unCode){
                    echo "<td style=\"border: solid 1px black; padding: 0.5em; text-align: center;\">" . $cellule . "</td>";
                }
                else{
                    $formID = $cellule;
                    $unCode = true;
                }
            }

            //Modifier
            echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=editFormation&numForma=$formID\">
      <img src=\"images/edit.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";

            //Supprimer
            echo "<td style=\"border-left: solid 1px black; text-align: center;\">
      <a href =\"index.php?m2lMP=supprimerFormation&numForma=$formID\">
      <img src=\"images/poubelle.svg\" alt=\"Supprimer\" style=\"height: 38px; width: 42px;\"> </a></td>";
            echo "</tr>";

        }
    }

}