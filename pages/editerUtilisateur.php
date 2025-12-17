<?php
require_once ('identifier.php');
require_once ('connexiondb.php');

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$requete = "select * from utilisateur where iduser=$id";

$resultat = $pdo->query($requete);
$utilisateur = $resultat->fetch();
$login = $utilisateur['login'];
$email = $utilisateur['email'];

?>
<! DOCTYPE HTML>
    <HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un utilisateur</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>

    <body>
        <?php include ("menu.php"); ?>
        
        <div class="container form-shell">
            <div class="form-card">
                <div class="form-card__title">Correction / changement du compte</div>
                <form method="post" action="updateUtilisateur.php" class="form">
                    <input type="hidden" name="iduser" value="<?php echo $id ?>" />

                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="login">Login :</label>
                                <input type="text" id="login" name="login" placeholder="Login" class="form-control"
                                    value="<?php echo $login ?>" />
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" id="email" name="email" placeholder="Email" class="form-control"
                                    value="<?php echo $email ?>" />
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span>
                        Enregistrer
                    </button>

                    <a href="editPwd.php" class="btn btn-link" style="color:#a5b4fc;">
                        Changer le mot de passe
                    </a>
                </form>
            </div>
        </div>
    </body>

    </HTML>