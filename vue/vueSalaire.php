<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
        <div class="texteAccueil">
		<h1>Mes bulletins de salaire</h1>

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
				Numéro du contrat de travail
			</th>

		<?php
		$unUser = unserialize($_SESSION['identification']);
		$lesBulletins = UserDAO::bulletin($unUser->getIdUser());
		Affichage::transforTabSalaire($lesBulletins);
		?>

		</table>

        </div>

	</main>

	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>