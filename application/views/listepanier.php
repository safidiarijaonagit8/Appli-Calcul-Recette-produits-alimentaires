<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('template/header.php') ?>
</head>

<body class="animsition">

	<!-- Header -->
	<?php include('template/navBar.php') ?>
	<!-- Cart ou Panier  -->
	<?php include('template/panier.php') ?>
	<!-- Slider -->
</br>
</br>
</br>
</br>

	<!-- CONTENUE -->
	<!-- _______________________________________ -->
	<!-- Banner -->
	<?php include('template/banner.php') ?>

	<!-- Product -->
	<br>
    <br>
    <h2 align="center"> Panier  prix total : <?php echo $prixtotal;?> Ar</h2>
        </br>
        </br>
        <div id="gauche">
        <a href="<?php echo site_url_controller_methode('Accueil/payer') ?>?ptotal=<?php echo $prixtotal;?>">Payer</a>
        </br>
        <a href="<?php echo site_url_controller_methode('Accueil/viderpanier') ?>">Vider panier</a>
        </br>
        <a href="<?php echo site_url_controller_methode('Accueil/stock') ?>">Valider et voir reste stock</a>
</div>
        </br>
        <div id="table">
        <table class="table table-striped">

        <thead>
    <tr>
     
     
      <th scope="col">image</th>
      <th scope="col">Nom</th>
      <th scope="col">unite</th>
      <th scope="col">isa</th>
      <th scope="col">prix unitaire</th>
      <th scope="col">type</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($listepanier as $lp){?>
    <tr>
    
      <td><img src="<?php echo img_loader($lp['image'], '') ?>" width="50px" height="50px" alt="..."></td>
      <td><?php echo $lp['nom'];?></td>
      <td><?php echo $lp['qte'];?> <?php echo $lp['format'];?> </td>
      <td><?php echo $lp['isa'];?></td>
      <td><?php echo $lp['prix'];?> Ar</td>
      <td><?php echo $lp['type'];?></td>
      
    </tr>
<?php }?>
  </tbody>

</table>

<br>
<br>

                    
<br>
<br>
	<!-- _______________________________________ -->

	<!-- Footer -->
	<?php include('template/footer.php') ?>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<?php include('template/modale.php') ?>
	<!-- Js -->
	<?php include('template/js.php') ?>
</body>

</html>