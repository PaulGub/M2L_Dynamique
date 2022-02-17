<div class="conteneur">
    <header>
        <?php include 'haut.php';?>
    </header>
    <main>
        <div class="texteAccueil">
            <h1><span>Gestion des formations</span></h1>

            <div class="button"><a href="index.php?m2lMP=ajoutFormation">Ajouter une formation</a></div>

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


                //Récupération et affichage de toutes les formations
                $listFormation = new Formation();
                $listFormation = FormationDAO::toutesLesFormations();
                if($listFormation != null){
                    $_SESSION['formationsOuvertes'] = array();
                    foreach ($listFormation as $uneFormation){
                        array_push($_SESSION['formationsOuvertes'], serialize($uneFormation));
                    }
                    Affichage::transforTabFormations($listFormation);
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