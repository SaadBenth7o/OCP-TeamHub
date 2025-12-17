<?php
require_once ('connexiondb.php');
require_once ('identifier.php');

$ide = isset($_GET['idE']) ? $_GET['idE'] : 0;
$requete = "select * from emploi where idEmploi=$ide";
$resultat = $pdo->query($requete);
$emploi = $resultat->fetch();
$nome = $emploi['nomEmploi'];
$specialite = strtolower($emploi['specialite']);
?>

<!DOCTYPE HTML>
<HTML>

<head>
    <meta charset="utf-8">
    <title>Edition d'une Emploi</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">

</head>

<body>
    <?php include ("menu.php"); ?>
    <div class="container form-shell">

        <div class="form-card">
            <div class="form-card__title">Correction / changement de l'emploi</div>
            <form method="post" action="updateEmploi.php" class="form">
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="idE">ID de l'emploi :</label>
                            <input type="text" id="idE" name="idE" class="form-control" value="<?php echo $ide ?>" />
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="nomE">Nom de l'emploi :</label>
                            <input type="text" id="nomE" name="nomE" placeholder="Nom de l'emploi"
                                class="form-control" value="<?php echo $nome ?>" />
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="emploi">Emploi :</label>
                            <select name="emploi" class="form-control" id="emploi">
                                <option value="ts" <?php if ($emploi == "ts") echo "selected" ?>>Technicien support</option>
                                <option value="sit" <?php if ($emploi == "sit") echo "selected" ?>>Secretaire IT</option>
                                <option value="as" <?php if ($emploi == "as") echo "selected" ?>>Analyste de systemes</option>
                                <option value="ar" <?php if ($emploi == "ar") echo "selected" ?>>Administrateur reseau</option>
                                <option value="di" <?php if ($emploi == "di") echo "selected" ?>>Directeur IT</option>
                                <option value="dev" <?php if ($emploi == "dev") echo "selected" ?>>Développeur</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="specialite">Spécialité :</label>
                            <select name="specialite" class="form-control" id="specialite">
                                <option value="sans" <?php if ($specialite == "sans") echo "selected" ?>>sans specialité</option>
                                <option value="fs" <?php if ($specialite == "fs") echo "selected" ?>>Full Stack</option>
                                <option value="bd" <?php if ($specialite == "bd") echo "selected" ?>>Backend development</option>
                                <option value="fd" <?php if ($specialite == "fd") echo "selected" ?>>Frontend development</option>
                                <option value="md" <?php if ($specialite == "md") echo "selected" ?>>Mobile development</option>
                                <option value="db" <?php if ($specialite == "db") echo "selected" ?>>Database management</option>
                                <option value="da" <?php if ($specialite == "da") echo "selected" ?>>Data analysis</option>
                                <option value="hs" <?php if ($specialite == "hs") echo "selected" ?>>Hardware support</option>
                                <option value="ns" <?php if ($specialite == "ns") echo "selected" ?>>Network security</option>
                                <option value="adm" <?php if ($specialite == "adm") echo "selected" ?>>Administration</option>
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