<?php
    require_once('identifier.php');
    require_once('connexiondb.php');

    $idG=isset($_GET['idG'])?$_GET['idG']:0;
    $requeteG="select * from gestionnaire where idGestionnaire=$idG";
    $resultatG=$pdo->query($requeteG);
    $gestionnaire=$resultatG->fetch();
    $nom=$gestionnaire['nom'];
    $prenom=$gestionnaire['prenom'];
    $civilite=strtoupper($gestionnaire['civilite']);
    $date=$gestionnaire['date'];
    $nomEmploi=$gestionnaire['nomEmploi'];
    $specialite=$gestionnaire['specialite'];
    $tel=$gestionnaire['tel'];
    $nomPhoto=$gestionnaire['photo'];

    $requeteE="select * from emploi";
    $resultatE=$pdo->query($requeteE);

?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un gestionnaire</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        <style>
        body {
            background-image: url('../images/OCPBG4.jpg');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
        }
    </style>
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Correction/Changement :</div>
                <div class="panel-body">
                    <form method="post" action="updateGestionnaire.php" class="form"  enctype="multipart/form-data">
						<div class="form-group">
                             <label for="idG">id du gestionnaire: <?php echo $idG ?></label>
                            <input type="hidden" name="idG" class="form-control" value="<?php echo $idG ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control" value="<?php echo $nom ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control"
                                   value="<?php echo $prenom ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="civilite">Civilité :</label>
                            <div class="radio">
                                <label><input type="radio" name="civilite" value="F"
                                    <?php if($civilite==="F")echo "checked" ?> checked/> F </label><br>
                                <label><input type="radio" name="civilite" value="M"
                                    <?php if($civilite==="M")echo "checked" ?>/> M </label>
                            </div>
                        </div>

                        <div class="form-group">
                             <label for="date">Date de naissance :</label>
                            <input type="date" name="date" placeholder="Date de naissance" class="form-control"
                                   value="<?php echo $date ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="nomEmploi">emploi:</label>
				            <select name="nomEmploi" class="form-control" id="nomEmploi">
                              <?php while($emploi=$resultatE->fetch()) { ?>
                                <option value="<?php echo $emploi['nomEmploi'] ?>"
                                         <?php if($nomEmploi===$emploi['nomEmploi']) echo "selected" ?>> 
                                    <?php echo $emploi['nomEmploi'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>

                        <div class="form-group">
    <label for="specialite">Specialité:</label>
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


                        <div class="form-group">
                             <label for="tel">Téléphone:</label>
                            <input type="tel" name="tel" placeholder="Téléphone" class="form-control"
                                   value="<?php echo $tel ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="photo">Photo :</label>
                            <input type="file" name="photo" />
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>