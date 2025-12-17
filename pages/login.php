<?php
session_start();
if (isset($_SESSION['erreurLogin'])) {
    $erreurLogin = $_SESSION['erreurLogin'];
} else {
    $erreurLogin = "";
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OCP IT - Connexion</title>

    <!-- Bootstrap 5 (CDN) for a more modern base UI -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Modern icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- App styles -->
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>

<body class="auth-body">
    <div class="auth-page">
        <div class="auth-bg-orb auth-bg-orb--one"></div>
        <div class="auth-bg-orb auth-bg-orb--two"></div>

        <div class="auth-card shadow-lg">
            <div class="auth-card__header">
                <div class="auth-brand">
                    <img src="../images/OCPLOGO.png" alt="OCP IT" class="auth-brand__logo">
                    <div class="auth-brand__text">
                        <span class="auth-brand__title">OCP IT</span>
                        <span class="auth-brand__subtitle">TeamHub - Portail des collaborateurs</span>
                    </div>
                </div>
                <h1 class="auth-title">Heureux de vous revoir</h1>
                <p class="auth-subtitle">Connectez-vous pour accéder au portail de gestion des collaborateurs IT.</p>
            </div>

            <?php if (!empty($erreurLogin)) { ?>
                <div class="alert alert-danger d-flex align-items-center auth-alert" role="alert">
                    <i class="fa-solid fa-circle-exclamation me-2"></i>
                    <div><?php echo htmlspecialchars($erreurLogin, ENT_QUOTES, 'UTF-8'); ?></div>
                </div>
            <?php } ?>

            <form method="post" action="seConnecter.php" class="auth-form">
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <div class="auth-input-wrapper">
                        <span class="auth-input-icon">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        <input type="text" id="login" name="login" class="form-control auth-input"
                            placeholder="ex : j.dupont" autocomplete="off" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="pwd" class="form-label">Mot de passe</label>
                    <div class="auth-input-wrapper">
                        <span class="auth-input-icon">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="pwd" name="pwd" class="form-control auth-input"
                            placeholder="Votre mot de passe" required>
                        <button type="button" class="btn btn-link btn-sm auth-toggle-pwd" aria-label="Afficher le mot de passe">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between mb-4 auth-form__footer">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">
                            Se souvenir de moi
                        </label>
                    </div>
                    <span class="auth-meta">Accès sécurisé OCP IT</span>
                </div>

                <button type="submit" class="btn btn-primary w-100 auth-submit-btn">
                    <span>Se connecter</span>
                    <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </button>

                <div class="auth-divider">
                    <span>ou</span>
                </div>

                <div class="text-center">
                    <a href="nouvelUtilisateur.php" class="auth-link">
                        <i class="fa-regular fa-id-card me-1"></i>
                        Créer un nouveau compte
                    </a>
                </div>
            </form>

            <div class="auth-footer-meta">
                <span>© <?php echo date('Y'); ?> OCP IT • Plateforme interne</span>
                <span class="auth-dot"></span>
                <span>Accès réservé aux collaborateurs autorisés</span>
            </div>
        </div>
    </div>

    <script>
        // Toggle visibilité mot de passe (sans dépendance à jQuery)
        document.addEventListener('DOMContentLoaded', function () {
            var toggleBtn = document.querySelector('.auth-toggle-pwd');
            var pwdInput = document.getElementById('pwd');

            if (toggleBtn && pwdInput) {
                toggleBtn.addEventListener('click', function () {
                    var isPassword = pwdInput.getAttribute('type') === 'password';
                    pwdInput.setAttribute('type', isPassword ? 'text' : 'password');

                    var icon = toggleBtn.querySelector('i');
                    if (icon) {
                        icon.classList.toggle('fa-eye');
                        icon.classList.toggle('fa-eye-slash');
                    }
                });
            }
        });
    </script>

    <!-- Optionally Bootstrap JS for components (not required for this page, but ready for others) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>