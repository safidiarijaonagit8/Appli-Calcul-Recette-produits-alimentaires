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
</head>

<body>

    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <h1 class="sign-up__title">Client</h1>
            <p class="sign-up__subtitle">Demande ajout argent dans portefeuille virtuelle </p>
          
            <form class="sign-up-form form" action="<?php echo site_url_controller_methode('Accueil/demandeajoutargent') ?>" method="post">
                <label class="form-label-wrapper">
                    <p class="form-label">Montant </p>
                    <input class="form-input" type="number" name="demandemontant">
                </label>
                <input type="hidden" name="idclient" value=<?php echo $idclient;?>>
                <button class="form-btn primary-default-btn transparent-btn">Demander</button>
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