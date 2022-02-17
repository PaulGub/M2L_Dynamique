<div class="conteneur">
    <header>
        <?php include 'haut.php';?>
    </header>
    <main>
        <div class="texteAccueil">
            <h1><span>Les demandes de la formation</span></h1>
            <h2><span>Nombre de place encore disponnible pour la formation : <?php echo FormationDAO::calculNbPlaceForma($_GET['numForma'])?></span></h2>
            <br/>
            <h3><span><?php echo $_SESSION["etatModif"] ?></span></h3>
            <br/>
            <?php
            if (array_key_exists("message", $_SESSION)) {
                echo $_SESSION["message"];
                $_SESSION["message"] = NULL;
            }
            ?>
            <table>
                <?php
                require_once 'lib/Affichage.php';
                require_once 'modele/dto/User.php';
                require_once 'modele/dao/UserDAO.php';

                //Récupération et affichage des utilisateurs qui ont postulés pour la formation
                $listUser = UserDAO::listeUtilisateurDemandeFormation($_GET['numForma']);
                if($listUser != null){
                    Affichage::transforTabDemandeUtilisateur($listUser, $_GET['numForma']);
                }
                else{
                    echo "<h2 style=\"text-align:center;\">Aucun utilisateur a formulé une demande pour cette formation.</h2>";
                }
                ?>
            </table>
        </div>
    </main>
    <footer>
        <?php include 'bas.php';?>
    </footer>
</div>