<div class="conteneur">
    <header>
        <?php include 'haut.php';?>
    </header>
    <main>
        <div class="texteAccueil">
            <h1><span>Demandes des intervenants</span></h1>
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

                //Récupération et affichage des utilisateurs ayant fait au moins une demande pour une formation
                $listUser = UserDAO::listeDemandeUtilisateur();
                if($listUser != null){
                    Affichage::transforTabUtilisateurDemande($listUser);
                }
                else{
                    echo "<h2 style=\"text-align:center;\">Aucun utilisateur a formulé une demande pour une formation.</h2>";
                }
                ?>
            </table>
        </div>
    </main>
    <footer>
        <?php include 'bas.php';?>
    </footer>
</div>