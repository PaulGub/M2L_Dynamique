<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
        <div class="texteAccueil">
		<h1>Gestion des contrats</h1>
        <br>

		<h2><i>Tous les salariés de la M2L :</i></h2>

		
		<table>
			<th>
				Numéro du salarié
			</th>

			<th>
				Prénom du salarié
			</th>

			<th>
				Nom du salarié
			</th>

		<?php
		$lesContrats = UserDAO::salarieUser();
		Affichage::transforTab($lesContrats);
		?>

		</table>
		<br>
        <h2><i>Tous les contrats des salariés de la M2L :</i></h2>

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
        <h2><i>Créer un contrat :</i></h2>
		<?php
		$formulaireCreaContrats->afficherFormulaire();
		?>
		
		<br>
        <h2><i>Modifier un contrat :</i></h2>
		<br>
		<?php
		$formulaireModifContrats->afficherFormulaire();
		?>

		<br>
        <h2><i>Supprimer un contrat :</i></h2>
		<br>
		<?php
		$formulaireSuprrContrats->afficherFormulaire();
		?>
        </div>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>