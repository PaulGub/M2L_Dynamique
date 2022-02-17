<div class="conteneur">
    <header>
        <?php include 'haut.php' ;?>
    </header>
    <main>
        <div class="texteAccueil">
            <h1><span>Ajouter une formation</span></h1>
            <form action="index.php?m2lMP=ajouterFormation" method="post">

                <!--Nom de la formation -->
                <div class="nomFormation">
                    <fieldset>
                        <legend>Intitulé de la formation</legend>
                    <input type="text" name="nomForm" placeholder="Nom" maxlength="50" required="required">
                    </fieldset>
                </div>

                <!--Description de la formation -->
                <div class="descriptionFormation">
                    <fieldset>
                        <legend>Description de la formation</legend>
                    <input type="text" name="descForm" placeholder="Description" maxlength="50" required="required">
                    </fieldset>
                </div>

                <!--Durée  de la formation -->
                <div class="dureeFormation">
                    <fieldset>
                        <legend>Durée de la formation</legend>
                    <input type="number" name="dureeForm" placeholder="Durée(en heure)" maxlength="11" required="required">
                    </fieldset>
                </div>

                <!--Date de l'ouverture de l'inscription de la formation -->
                <div class="dateDebInscriptionFormation">
                    <fieldset>
                        <legend>Date de début des inscriptions de la formation</legend>
                    <input type="date" name="dateDebInscription" placeholder="Date" required="required">
                    </fieldset>
                </div>

                <!--Date de cloture de l'inscription de la formation -->
                <div class="dateFinInscriptionFormation">
                    <fieldset>
                        <legend>Date de fin des inscriptions de la formation</legend>
                    <input type="date" name="dateFinInscription" placeholder="Date" required="required">
                    </fieldset>
                </div>

                <!--Date de début de la formation -->
                <div class="dateDebFormation">
                    <fieldset>
                        <legend>Date de début de la formation</legend>
                    <input type="date" name="dateDebFormation" placeholder="Date" required="required">
                    </fieldset>
                </div>

                <!--Date de fin de la formation -->
                <div class="dateFinFormation">
                    <fieldset>
                        <legend>Date de fin de la formation</legend>
                    <input type="date" name="dateFinFormation" placeholder="Date" required="required">
                    </fieldset>
                </div>

                <!--Nombre max d'inscription pour la formation -->
                <div class="nbMaxFormation">
                    <fieldset>
                        <legend>Nombre maximum de personnes pour la formation</legend>
                    <input type="number" name="nbMaxForm" placeholder="Nombre de personnes" maxlength="11" required="required">
                    </fieldset>
                </div>

                <div class="button"><input type="submit" value="Ajouter la formation"></div>

            </form>
        </div>
    </main>
    <footer>
        <?php include 'bas.php' ;?>
    </footer>
</div>