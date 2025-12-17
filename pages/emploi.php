<?php

require_once ("connexiondb.php");
require_once ('identifier.php');

$size = isset($_GET['size']) ? $_GET['size'] : 6;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $size;

$requete = "select * from emploi limit $size offset $offset";
$requeteCount = "select count(*) countE from emploi";
$resultatE = $pdo->query($requete);
$resultatcount = $pdo->query($requeteCount);
$tabcount = $resultatcount->fetch();
$nbrEmploi = $tabcount['countE'];

$reste = $nbrEmploi % $size;
if ($reste === 0) {
    $nbrPage = $nbrEmploi / $size;
} else {
    $nbrPage = floor($nbrEmploi / $size) + 1; // la méthode floor donne la partie entière d'un nombre décimal
}
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Gestion des emplois</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>

<body>
    <?php include ("menu.php"); ?>

    <div class="container-fluid">
        <div class="panel panel-success margetop">
            <div class="panel-heading">AJOUTER :  </div>
            <div class="panel-body">
                <a href="nouvelleEmploi.php" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus"></span> Nouvelle emploi
                </a>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">Liste des Emplois (<?php echo $nbrEmploi ?> Emplois)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id emploi</th>
                            <th>Nom emploi</th>
                            <th>Spécialité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($emploi = $resultatE->fetch()) { ?>
                            <tr>
                                <td><?php echo $emploi['idEmploi'] ?> </td>
                                <td><?php echo $emploi['nomEmploi'] ?> </td>
                                <td><?php echo $emploi['specialite'] ?> </td>
                                <td>
                                    <a href="editeremploi.php?idE=<?php echo $emploi['idEmploi'] ?>">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    &nbsp;
                                    <a onclick="return confirm('Etes vous sûr de supprimer?')" href="supprimerEmploi.php?idE=<?php echo $emploi['idEmploi'] ?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <ul class="pagination pagination-lg">
                        <?php for ($i = 1; $i <= $nbrPage; $i++) { ?>
                            <li class="<?php if ($i == $page) echo 'active' ?>">
                                <a href="emploi.php?page=<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</HTML>
