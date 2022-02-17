<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
        <div class="texteAccueil">
            <h1>Gestion des bulletins</h1>

            <table>
            <br>
            <h2><i>Tous les contrats des salariés de la M2L :</i></h2>

            <>
                <th>
                    Numéro du contrat
                </th>

                <th>
                    Début du contrat
                </th>

                <th>
                    Fin du contrat
                </th>

                <th>
                    Type du contrat
                </th>

                <th>
                    Nombres d'heures
                </th>

                <th>
                    Numéro du salarié
                </th>

                <th>
                    Nom du salarié
                </th>

                <th>
                    Prénom du salarié
                </th>

            <?php
            $lesContrats = UserDAO::contratUser();
            Affichage::transforTab($lesContrats);
            ?>
            </table>
            <br>
            <h2><i>Tous les bulletins des salariés de la M2L :</i></h2>

            <table>
                <th>
                    Numéro du bulletin
                </th>

                <th>
                    Mois du bulletin
                </th>

                <th>
                    Année du bulletin
                </th>

                <th>
                    Lien du bulletin
                </th>

                <th>
                    Bulletin lié au contrat
                </th>

            <?php
            $unUser = unserialize($_SESSION['identification']);
            $lesContrats = UserDAO::bulletinUser($unUser->getIdUser());
            Affichage::transforTab($lesContrats);
            ?>

            </table>

            <br>
            <h2><i>Créer un bulletin :</i></h2>
            <br>
            <p><i>Il est actuellement imposible d'uploadés les bulletins directemet. Il faut les déposer dans le dossier racine de l'application.</i></p>
            <br>
            <?php
            $formulaireCreaBulletins->afficherFormulaire();
            ?>

            <br>
            <h2><i>Modifier un bulletin :</i></h2>
            <?php
            $formulaireModifBulletins->afficherFormulaire();
            ?>

            <br>
            <h2><i>Supprimer un bulletin :</i></h2>
            <?php
            $formulaireSuprrBulletins->afficherFormulaire();
            ?>
        </div>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>