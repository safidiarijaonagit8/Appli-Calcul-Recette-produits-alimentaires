<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('template/header.php') ?>
</head>

<body class="animsition">

	<!-- Header -->
	<?php include('templateAdmin/navBar.php') ?>
	<!-- Cart ou Panier  -->
  <?php include('template/banner.php') ?>
	
	<!-- Slider -->
</br>
</br>
</br>
</br>

	<!-- CONTENUE -->
	<!-- _______________________________________ -->
	<!-- Banner -->

    <?php if(isset($listedemande)){?>
        <h2 align="center"> Liste demande argent </h2>
        </br>
        </br>
        <div id="table">
        <table class="table table-striped">

        <thead>
    <tr>
     
      <th scope="col">Nom</th>
      <th scope="col">Montant demande</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($listedemande as $l){?>
    <tr>
   
      <td><?php echo $l['nom'];?></td>
      <td><?php echo $l['montant'];?></td>
      <td><a href="<?php echo site_url_controller_methode('Accueil/validerdemande') ?>?id=<?php echo $l['id'];?>&&idu=<?php echo $l['idutilisateur'];?>&&m=<?php echo $l['montant'];?>">Valider</a></td>
    </tr>
<?php }?>
  </tbody>

</table>
    </div>
        <?php }?>

        <?php if(isset($listestock)){?>
        <h2 align="center"> Reste stock par produit </h2>
        </br>
        </br>
        <div id="table">
        <table class="table table-striped">

        <thead>
    <tr>
     
      <th scope="col">Nom</th>
      <th scope="col">Categorie</th>
      <th scope="col">reste</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($listestock as $ls){?>
    <tr>
   
      <td><?php echo $ls['nom'];?></td>
      <td><?php echo $ls['categorie'];?></td>
      <td><?php echo $ls['reste'];?> <?php echo $ls['format'];?> </td>
      
    </tr>
<?php }?>
  </tbody>

</table>
    </div>
        <?php }?>
        <?php if(isset($statproduit)){?>
        <h2 align="center"> Stat produit </h2>
        </br>
        </br>
        <div id="table">
        <table class="table table-striped">

        <thead>
    <tr>
     
      <th scope="col">Nom</th>
      <th scope="col">isa lafo</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($statproduit as $l){?>
    <tr>
   
      <td><?php echo $l['nom'];?> <?php echo $l['qte'];?> <?php echo $l['format'];?></td>
      <td><?php echo $l['isalafo'];?> </td>
     
    </tr>
<?php }?>
  </tbody>

</table>
    </div>
        <?php }?>
	<!-- Product -->
	
	<!-- _______________________________________ -->

	<!-- Footer -->
    </br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
    <?php include('template/footer.php') ?>
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	
	<!-- Js -->
	<?php include('template/js.php') ?>
</body>

</html>