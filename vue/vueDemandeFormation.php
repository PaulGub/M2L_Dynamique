<div class="conteneur">
    <header>
        <?php include 'haut.php';?>
    </header>
    <main>
        <div class="texteAccueil">
            <h1><span>Les formations demandées</span></h1>
            <?php
            //Vérification et affichage des messages d'information
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

                //Récupération de l'objet utilisateur depuis la variable de session identification
                $unUser = unserialize($_SESSION['identification']);

                //Récupération et affichage des formations demandées par l'utilisateur
                $listFormationDemandee = new Formation();
                $listFormationDemandee = FormationDAO::formationsDemandees($unUser->getIdUser());
                $_SESSION['formationsOuvertes'] = array();
                foreach ($listFormationDemandee as $uneFormation){
                    array_push($_SESSION['formationsOuvertes'], serialize($uneFormation));
                }
                Affichage::transforTabFormationsDemandee($listFormationDemandee);
                ?>
            </table>
        </div>
    </main>
    <footer>
        <?php include 'bas.php';?>
    </footer>
</div>