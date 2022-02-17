<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
        <div class="texteAccueil">
            <h1>Mes contrats</h1>

            <table>
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
                    Numéro d'utilisateur
                </th>

            <?php
            $unUser = unserialize($_SESSION['identification']);
            $lesContrats = UserDAO::contrat($unUser->getIdUser());
            Affichage::transforTab($lesContrats);
            ?>

            </table>
        </div>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>