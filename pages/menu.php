<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OCP IT</title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>

<body>

    <?php require_once ('identifier.php'); ?>
    <nav class="navbar navbar-default navbar-fixed-top ">
        <div class="container-fluid">
            <div class="navbar-header">

                <img src="../images/OCPLOGO.png" alt="Logo" style="height: 60px; 
   vertical-align: middle; ">

            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="gestionnaires.php"> Staff OCP IT</a></li>
                <?php if ($_SESSION['user']['role'] == 'ADMIN') { ?>
                    <li><a href="emploi.php"><i class="fa fa-users"></i>&nbsp Emplois</a></li>
                   </li>
                <?php } ?>
                <li><a href="../calendrier2/index.html"> Evénements </a></li>
                <?php if ($_SESSION['user']['role'] == 'ADMIN') { ?>
                    
                    <li><a href="Utilisateurs.php"> Utilisateurs</a></li>
                <?php } ?>
                <li>
                    <a href="editerUtilisateur.php?id=<?php echo $_SESSION['user']['iduser'] ?>">
                        <i class="fa fa-user-circle-o"></i>
                        <?php echo ' ' . $_SESSION['user']['login'] ?>
                    </a>
                </li>
                <li>
                    <a href="seDeconnecter.php">
                        <i class="fa fa-sign-out"></i>
                        &nbsp Se déconnecter
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Rest of your content -->
</body>

</html>