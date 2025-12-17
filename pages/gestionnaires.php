<?php

require_once ('identifier.php');
require_once ("connexiondb.php");

$size = isset($_GET['size']) ? $_GET['size'] : 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $size;

$requeteEmploi = "select * from emploi";

$requete = "select * from gestionnaire limit $size offset $offset";
$requeteCount = "select count(*) countG from gestionnaire";

$resultatE = $pdo->query($requeteEmploi);
$resultatG = $pdo->query($requete);
$resultatcount = $pdo->query($requeteCount);
$tabcount = $resultatcount->fetch();
$nbrGestionnaire = $tabcount['countG'];

$reste = $nbrGestionnaire % $size;
if ($reste === 0) {
    $nbrPage = $nbrGestionnaire / $size;
} else {
    $nbrPage = floor($nbrGestionnaire / $size) + 1; // la methode floor donne la partie entiere d'un nbr décimal
}
?>
<!DOCTYPE HTML>
<HTML>

<head>
    <meta charset="utf-8">
    <title>Gestion des gestionnaires</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">

    <style>
        .button1 {
            background-color: #4CAF50;
        }
        .button2 {
            background-color: red;
        }
    </style>
</head>



<body>
    <?php include ("menu.php"); ?>

    
    <div class="container-fluid">
        <div class="panel panel-success margetop">
            <div class="panel-heading" > AJOUTER :  </div>
            <div class="panel-body">
                
                    <a href="nouveauGestionnaire.php" class="btn btn-success">
                        <span class="glyphicon glyphicon-plus"></span> Nouveau Gestionnaire
                    </a>
              
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">Liste des gestionnaires (<?php echo $nbrGestionnaire ?> Gestionnaires)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Id gestionnaire</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de naissance</th>
                            <th>Civilité</th>
                            <th>Emploi</th>
                            <th>Spécialité</th>
                            <th>Téléphone</th>
                            <th>Modif</th>
                            <?php if ($_SESSION['user']['role'] == 'ADMIN') { ?>
                                <th>Supp</th>
                            <?php } ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($gestionnaire = $resultatG->fetch()) { ?>
                            <tr>
                                <td><img src="../images/<?php echo $gestionnaire['photo'] ?>" width="50px" height="50px"
                                        class="img-circle"> </td>
                                <td><?php echo $gestionnaire['idGestionnaire'] ?> </td>
                                <td><?php echo $gestionnaire['nom'] ?> </td>
                                <td><?php echo $gestionnaire['prenom'] ?> </td>
                                <td><?php echo $gestionnaire['date'] ?> </td>
                                <td><?php echo $gestionnaire['civilite'] ?> </td>
                                <td><?php echo $gestionnaire['nomEmploi'] ?> </td>
                                <td><?php echo $gestionnaire['specialite'] ?> </td>
                                <td><?php echo $gestionnaire['tel'] ?> </td>

                                <td>
                                    <a href="editerGestionnaire.php?idG=<?php echo $gestionnaire['idGestionnaire'] ?>">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                </td>
                                <td>
                                    <?php if ($_SESSION['user']['role'] == 'ADMIN') { ?>

                                        <a onclick="return confirm('Etes vous sûr de supprimer?')"
                                            href="supprimerGestionnaire.php?idG=<?php echo $gestionnaire['idGestionnaire'] ?>">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <ul class="pagination pagination-lg">
                        <?php for ($i = 1; $i <= $nbrPage; $i++) { ?>
                            <li class="<?php if ($i == $page)
                                echo 'active' ?>">
                                    <a href="gestionnaires.php?page=<?php echo $i; ?>">
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