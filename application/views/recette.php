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
	<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Recette
            </h3>
        </div>
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Toutes les recettes
                </button>
            
            </div>
     

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                </div>
            </div>

            <!-- Filter -->
        </div>
        <!-- Article  -->
        <?php  ?>
        <div class="row isotope-grid">
        <?php foreach ($listerecette as $l) { ?>
       <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $l['nom'] ?>">
                    <!-- Block2 -->
                    <div class="block2">
                        <form action="<?php echo site_url_controller_methode('Accueil/recette1') ?>" method="post">
                            <div class="block2-pic hov-img0">
                                <img id="photo" src="http://safidyhost.alwaysdata.net/assets/images/a/<?php echo $l['image'];?>" alt="IMG-PRODUCT">
                                http://safidyhost.alwaysdata.net/assets/images/a/<?php echo $l['image'];?>
                                <button type="submit" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                                    Ajouter au Panier
                                </button>
                            </div>
                            <input type="hidden" name="idrecette" value="<?php echo $l['id'] ?>">
                            
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 produit">
                                        <?php echo $l['nom'] ?>
                                    </a>
                                   
                                    <input class="mtext-104 cl3 txt-center num-product" type="number" min="1" name="qt" >
                                </div>
                                <div class="block2-txt-child2 flex-r p-t-3">
                                </div>
                            </div>

                        </form>
                       </div>
                      <div>  
            
                           
                    </div>
                </div>
                 <?php } ?>

        </div>
        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <!-- <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a> -->
            <ul class="pagination pagination-sm">
        
        <?php for($i = 1;$i<=$nbrPage;$i++){?>
             <li class="page-item"><a class="page-link" href="<?php echo site_url_controller_methode('Accueil/init') ?>?page_id=<?php echo $i;?>"><?php echo $i;?></a></li>
        <?php }?>
        </div>
    </div>
</section>

<script src="<?php echo  js_loader('jquery-3.4.1.min') ?>"></script>
  <!-- bootstrap js -->

  <script src="<?php echo  js_loader('bootstrap') ?>"></script>
  <!-- custom js -->

  <script src="<?php echo  js_loader('custom') ?>"></script>

<script src="<?php echo  js_loader('panier') ?>"></script>
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