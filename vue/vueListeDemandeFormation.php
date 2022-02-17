<div class="conteneur">
    <header>
        <?php include 'haut.php';?>
    </header>
    <main>
        <div class="texteAccueil">
            <h1><span>Liste des demandes des formations</span></h1>
            <table>
                <?php
                require_once 'lib/Affichage.php';
                require_once 'modele/dto/Formation.php';
                require_once 'modele/dao/FormationDAO.php';

                //Récupération et affichage des formations
                $listFormation = new Formation();
                $listFormation = FormationDAO::toutesLesFormations();
                if($listFormation != null){
                    $_SESSION['formations'] = array();
                    foreach ($listFormation as $uneFormation){
                        array_push($_SESSION['formations'], serialize($uneFormation));
                    }
                    Affichage::transforTabFormationsOuvertes($listFormation, true);
                }
                else{
                    echo "<h2 style=\"text-align:center;\">Il n'y a aucune formation actuellement.</h2>";
                }
                ?>
            </table>
        </div>
    </main>
    <footer>
        <?php include 'bas.php';?>
    </footer>
</div>