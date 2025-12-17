<?php
require_once ('identifier.php');
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>Changement de mot de passe</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/monjs.js"></script>
</head>

<body>
    <div class="container form-shell editpwd-page">
        <div class="form-card">
            <div class="form-card__title">Changement de mot de passe</div>
            <h2 class="text-center" style="margin-bottom: 20px;">
                Compte : <?php echo $_SESSION['user']['login'] ?>
            </h2>

            <form class="form-horizontal" method="post" action="updatePwd.php">
                <div class="input-container">
                    <input class="form-control oldpwd" type="password" name="oldpwd" autocomplete="new-password"
                        placeholder="Taper votre ancien mot de passe" required>
                    <i class="fa fa-eye fa-2x show-old-pwd clickable"></i>
                </div>

                <div class="input-container">
                    <input minlength="4" class="form-control newpwd" type="password" name="newpwd"
                        autocomplete="new-password" placeholder="Taper votre nouveau mot de passe" required>
                    <i class="fa fa-eye fa-2x show-new-pwd clickable"></i>
                </div>

                <input type="submit" value="Enregistrer" class="btn btn-success btn-block" />
            </form>
        </div>
    </div>

</body>

</html>