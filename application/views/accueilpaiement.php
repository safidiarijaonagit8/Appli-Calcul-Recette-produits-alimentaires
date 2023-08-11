<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('template/header.php') ?>
</head>

<body class="animsition">

	<!-- Header -->
	<?php include('template/navBar.php') ?>
	<!-- Cart ou Panier  -->
	
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
	
	<!-- _______________________________________ -->
Prix total : <?php echo $prixtotal;?>  Ar

</br>
</br>

Remarque : <?php echo $message;?>
</br>
</br>

Reste argent : <?php echo $vola;?> Ar
</br>


	<!-- Footer -->
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
	<?php include('template/modale.php') ?>
	<!-- Js -->
	<?php include('template/js.php') ?>
</body>

</html>