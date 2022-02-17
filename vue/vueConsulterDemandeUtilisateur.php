<div class="conteneur">
    <header>
        <?php include 'haut.php';?>
    </header>
    <main>
        <div class="texteAccueil">
            <h1><span>Les formations demandées</span></h1>
            <?php
            //Vérification de l'affichage des messages
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

                //Récupération des formations demandées par l'utilisateur
                $listFormationDemandee = new Formation();
                $listFormationDemandee = FormationDAO::formationsDemandees($_GET['idUser']);
                $_SESSION['formationsDemandees'] = array();
                foreach ($listFormationDemandee as $uneFormation){
                    array_push($_SESSION['formationsDemandees'], serialize($uneFormation));
                }
                Affichage::transforTabFormationsUtilisateur($listFormationDemandee);
                ?>
            </table>
        </div>
    </main>
    <footer>
        <?php include 'bas.php';?>
    </footer>
</div>