<?php
require_once "modele/dao/dBConnex.php";

  class connexionDAO{

      //fonction permettant l'authentification d'un utilisateur
      public static function authentication($unLog, $unMDP){
          $unMDP = hash('sha256', $unMDP);
          $resultat = DBConnex::getInstance()->prepare("SELECT Count(*) FROM UTILISATEUR where login = :login and mdp = :mdp;");
          $resultat -> bindParam(':login', $unLog);
          $resultat -> bindParam(':mdp', $unMDP);
          $resultat->execute();
          $statut = $resultat->fetch(PDO::FETCH_NUM);
          return $statut[0];
      }

  }