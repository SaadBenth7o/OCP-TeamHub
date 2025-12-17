<?php
require_once ('identifier.php');
require_once ('connexiondb.php');

$requeteE = "select * from emploi";
$resultatE = $pdo->query($requeteE);

?>
<! DOCTYPE HTML>
    <HTML>

    <head>
        <meta charset="utf-8">
        <title>Nouveau gestionnaire</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>

    <body>
        <?php include ("menu.php"); ?>

        <div class="container form-shell">
            <div class="form-card">
                <div class="form-card__title">Les infos du nouveau gestionnaire</div>
                <form method="post" action="insertGestionnaire.php" class="form" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" id="nom" name="nom" placeholder="Nom" class="form-control" />
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="prenom">Prénom :</label>
                                <input type="text" id="prenom" name="prenom" placeholder="Prénom" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="civilite">Civilité :</label>
                                <div class="radio">
                                    <label><input type="radio" name="civilite" value="F" checked /> F </label><br>
                                    <label><input type="radio" name="civilite" value="M" /> M </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="date">Date de naissance :</label>
                                <input type="date" id="date" name="date" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="nomEmploi">Emploi :</label>
                                <select name="nomEmploi" id="nomEmploi" class="form-control">
                                    <option>Technicien support</option>
                                    <option>Secretaire IT</option>
                                    <option>Analyste de systemes</option>
                                    <option>Administrateur reseau</option>
                                    <option>Directeur IT</option>
                                    <option selected>Développeur</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="specialite">Spécialité :</label>
                                <select name="specialite" id="specialite" class="form-control">
                                    <option>sans specialité</option>
                                    <option>Full Stack</option>
                                    <option>Backend development</option>
                                    <option>Frontend development</option>
                                    <option>Mobile development</option>
                                    <option>Database management</option>
                                    <option>Data analysis</option>
                                    <option>Hardware support</option>
                                    <option>Network security</option>
                                    <option>Administration</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="tel">Téléphone :</label>
                                <input type="tel" id="tel" name="tel" placeholder="Téléphone" class="form-control" />
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="photo">Photo :</label>
                                <input type="file" id="photo" name="photo" />
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span>
                        Enregistrer
                    </button>
                </form>
            </div>
        </div>
    </body>

    </HTML>