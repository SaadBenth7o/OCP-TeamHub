<?php 
    require_once('identifier.php');
?>

<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouvelle Emploi</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
        
    </head>
    <body>
    <?php include("menu.php"); ?>

        <div class="container form-shell">
            <div class="form-card">
                <div class="form-card__title">Nouvelle emploi</div>
                <form method="post" action="insertEmploi.php" class="form">
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="emploi">Emploi :</label>
                                <select name="emploi" class="form-control" id="emploi">
                                    <option value="Technicien support">Technicien support</option>
                                    <option value="Secretaire IT">Secretaire IT</option>
                                    <option value="Analyste de systemes">Analyste de systemes</option>
                                    <option value="Administrateur reseau">Administrateur reseau</option>
                                    <option value="Directeur IT">Directeur IT</option>
                                    <option value="Développeur" selected>Développeur</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="specialite">Spécialité :</label>
                                <select name="specialite" class="form-control" id="specialite">
                                    <option value="sans specialité">sans specialité</option>
                                    <option value="Full Stack">Full Stack</option>
                                    <option value="Backend development">Backend development</option>
                                    <option value="Frontend development">Frontend development</option>
                                    <option value="Mobile development">Mobile development</option>
                                    <option value="Database management">Database management</option>
                                    <option value="Data analysis">Data analysis</option>
                                    <option value="Hardware support">Hardware support</option>
                                    <option value="Network security">Network security</option>
                                    <option value="Administration">Administration</option>
                                </select>
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