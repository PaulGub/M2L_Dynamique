<div class="conteneur">
    <header>
        <?php include 'haut.php';?>
    </header>
    <main>
        <div class="texteAccueil">
            <h1><span>Les formations disponibles</span></h1>
            <?php
            if (array_key_exists("message", $_SESSION)) {
                echo $_SESSION["message"];
                $_SESSION["message"] = NULL;
            }
            ?>
            <table>
        <?php
        require_once 'lib/Affichage.php';
        require_once 'modele/dto/Formation.php';
        require_once 'modele/dao/FormationDAO.php';


        //Récupération et affichage des formations disponnible pour l'utilisateur sur celle qu'il n'a pas encore postulé
        //Et qui ont les inscriptions ouvertes
        $unUser = unserialize($_SESSION['identification']);
        $listFormationOuvertes = new Formation();
        $listFormationOuvertes = FormationDAO::formationOuvertes($unUser->getIdUser());
        if($listFormationOuvertes != null){
            $_SESSION['formationsOuvertes'] = array();
            foreach ($listFormationOuvertes as $uneFormation){
                array_push($_SESSION['formationsOuvertes'], serialize($uneFormation));
            }
            Affichage::transforTabFormationsOuvertes($listFormationOuvertes, false);
        }
        else{
            echo "<h2 style=\"text-align:center;\">Il n'y a aucune formation disponible pour vous actuellement.</h2>";
        }
        ?>
            </table>
        </div>
    </main>
    <footer>
        <?php include 'bas.php';?>
    </footer>
</div>