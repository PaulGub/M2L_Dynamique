<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
        <div class="texteAccueil">
            <h1>Gestion des comptes</h1>
            </table>

            <br>

            <table>
                <th>
                    Identifiant ligue
                </th>

                <th>
                    Nom ligue
                </th>

            <h2>Rappel des ligues</h2>
            <?php
            $lesContrats = UserDAO::lesligues();
            Affichage::transforTab($lesContrats);
            ?>

            </table>
            <br>

            <table>
            <h2>Rappel des clubs</h2>

                <th>
                    Identifiant club
                </th>

                <th>
                    Nom club
                </th>

            <?php
            $lesContrats = UserDAO::lesclubs();
            Affichage::transforTab($lesContrats);
            ?>

            </table>
            <br>

            <h2><i>Tous les salariés et bénévoles de la M2L :</i></h2>
            <p><i>Un salarié a un identifiant de fonction égale à 4.</i></p>
            <p><i>Un bénévole a un identifiant de fonction égale à 5.</i></p>
            <br>
            <table>
                <th>
                    Numéro du compte
                </th>

                <th>
                    Prénom
                </th>

                <th>
                    Nom
                </th>

                <th>
                    Login
                </th>

                <th>
                    Statut du compte
                </th>

                <th>
                    Identifiant  fonction
                </th>

                <th>
                    Identifiant  ligue
                </th>

                <th>
                    Identifiant  club
                </th>

            <?php
            $lesContrats = UserDAO::salarieBeneUser();
            Affichage::transforTab($lesContrats);
            ?>
            </table>

            <br>

            <h2><i>Créer un compte :</i></h2>
            <?php
            $formulaireCreaCompte->afficherFormulaire();
            ?>

            <br>
            <h2><i>Modifier un compte :</i></h2>
            <?php
            $formulaireModifCompte->afficherFormulaire();
            ?>

            <br>
            <h2><i>Supprimer un compte :</i></h2>
            <?php
            $formulaireSuprrCompte->afficherFormulaire();
            ?>
        </div>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>