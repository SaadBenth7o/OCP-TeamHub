<?php
session_start();
require_once ('connexiondb.php');

$login = isset($_POST['login']) ? $_POST['login'] : "";
$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : "";

if (!empty($login) && !empty($pwd)) {
    try {
        // Prepare the SQL statement with placeholders
        $requete = $pdo->prepare("SELECT iduser, login, email, role, etat FROM utilisateur WHERE login = :login AND pwd = :pwd");

        // Bind the parameters
        $hashed_pwd = md5($pwd); // Hash the password
        $requete->bindParam(':login', $login);
        $requete->bindParam(':pwd', $hashed_pwd);

        // Execute the query
        $requete->execute();
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        if ($resultat) {
            if ($resultat['etat'] == 1) {
                $_SESSION['user'] = $resultat;
                header('location:gestionnaires.php');
            } else {
                $_SESSION['erreurLogin'] = "<strong>Erreur!</strong> Votre compte est désactivé.<br> Veuillez contacter l'administrateur.";
                header('location:login.php');
            }
        } else {
            $_SESSION['erreurLogin'] = "<strong>Erreur!</strong> Login ou mot de passe incorrect!!";
            header('location:login.php');
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    $_SESSION['erreurLogin'] = "<strong>Erreur!</strong> Veuillez remplir tous les champs.";
    header('location:login.php');
}
?>