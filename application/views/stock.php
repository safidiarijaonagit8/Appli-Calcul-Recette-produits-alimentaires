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

    
        <h2 align="center"> Liste stock </h2>
        </br>
        </br>
        <div id="table">
        <table class="table table-striped">

        <thead>
    <tr>
     
      <th scope="col">Nom</th>
      <th scope="col">reste</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($listestock as $l){?>
    <tr>
   
      <td><?php echo $l['nom'];?></td>
      <td><?php echo intval($l['reste']);?></td>
     
    </tr>
<?php }?>
  </tbody>

</table>
    </div>


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