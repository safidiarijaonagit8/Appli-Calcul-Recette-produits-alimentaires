<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon"> -->
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?php echo cssAdmin_loader('style.min') ?>">
    <link rel="stylesheet" href="<?php echo css_loader('za') ?>">
</head>

<body>
    <div class="layer"></div>
    <main class="page-center">
        <?php
    if (isset($message)) {
            ?>
                <div class="alert alert-danger">
                    <span id="mena">Inscription reussie </span>
                </div>
            <?php } ?>
        <article class="sign-up">
            <h1 class="sign-up__title">Client </h1>
            <p class="sign-up__subtitle">Veuillez vous connecter d'abord</p>
            <form class="sign-up-form form" action="<?php echo site_url_controller_methode('Accueil/inscription') ?>" method="post">
                <label class="form-label-wrapper">
                    <p class="form-label">User name</p>
                    <input class="form-input" type="text" name="username" placeholder="Entrer user name" value="admin" required>
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Mot de passe</p>
                    <input class="form-input" type="password" name="mdp" placeholder="Entrer votre mot de passe" value="admin" required>
                </label>
               <button class="form-btn primary-default-btn transparent-btn">S inscrire</button>
            </form>
       
        </article>
    </main>
    <!-- Chart library -->
    <script src="<?php echo jsAdmin_loader('chart.min') ?>"></script>
    <!-- Icons library -->
    <script src="<?php echo jsAdmin_loader('feather.min') ?>"></script>
    <!-- Custom scripts -->
    <script src="<?php echo jsAdmin_loader('feather.min') ?>"></script>
</body>

</html>