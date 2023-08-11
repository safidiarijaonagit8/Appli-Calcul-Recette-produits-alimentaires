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
	
  
<div>

<br>
<br>
<br>
<div id="gauche" class="card mb-7" style="max-width: 540px;max-height: 440px;" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo img_loader($fiche[0]['image'], '') ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $fiche[0]['nom'];?> <?php echo $fiche[0]['qte'];?> <?php echo $fiche[0]['format'];?> </h5>
        <p class="card-text">Categorie : <?php echo $fiche[0]['categorie'];?></p>
        <p class="card-text">Prix : Ar <?php echo $fiche[0]['prix'];?></p>
        <p class="card-text">Stock : <?php echo $fiche[0]['reste'];?></p>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>



</div>


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