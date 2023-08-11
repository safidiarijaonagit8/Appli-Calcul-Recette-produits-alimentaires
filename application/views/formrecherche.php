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
     
        <article class="sign-up">
            <h1 class="sign-up__title">Rechercher</h1>
            <p class="sign-up__subtitle"></p>
            <form class="sign-up-form form" action="<?php echo site_url_controller_methode('Accueil/recherchemulticritere') ?>" method="post">
                <label class="form-label-wrapper">
                    Categorie
                <select name="categorie">
                <?php for ($j=0; $j < count($lc) ; $j++) { ?>
                    <option value="<?php echo $lc[$j]['id']?>"><?php echo $lc[$j]['nom']?></option>
                    <?php }?>
                </select>
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Format (kg ou g ou litre)</p>
                    <input class="form-input" type="text" name="format" placeholder="Entrer unite" >
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">qte min</p>
                    <input class="form-input" type="number" name="min"  >
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">qte max</p>
                    <input class="form-input" type="number" name="max"  >
                </label>
                
                <button class="form-btn primary-default-btn transparent-btn">Rechercher</button>
            </form>
    <script>
      
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