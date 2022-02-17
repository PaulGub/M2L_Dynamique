<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
        <div class="texteAccueil">
            <h1>Mes informations personnelles</h1>
            <table>
                <th>
                    Numéro du compte
                </th>

                <th>
                    Nom
                </th>

                <th>
                    Prénom
                </th>

                <th>
                    Identifiant
                </th>

                <th>
                    Statut
                </th>

                <th>
                    Fonction
                </th>

                <th>
                    Adhérent Club
                </th>

                <th>
                    Adhérent Ligue
                </th>
            <?php
            $unUser = unserialize($_SESSION['identification']);
            $list = array(UserDAO::infoLogin($unUser->getLogin()));
            Affichage::transforTab($list);
            ?>
            </table>
        </div>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>