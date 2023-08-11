<header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="top_nav_container">
            <div class="contact_nav">
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call : +01 123455678990
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  Email : demo@gmail.com
                </span>
              </a>
            </div>
            <form action="Accueil/formrecherche" class="search_form" method="post">
              <input type="text" class="form-control" placeholder="Search here...">
              <button class="" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
            <div class="user_option_box">
              <a href="" class="account-link">
                <i class="fa fa-user" aria-hidden="true"></i> 
                <span>
                  My Account
                </span>
              </a>
              <div class="wrap-icon-header flex-w flex-r-m">
               

               <div id="pa" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="">
                   <i class="zmdi zmdi-shopping-cart"></i>
               </div>

             
           </div>
           <script>
               function getPanier() {
                   let panier = localStorage.getItem('panier');
                   let result;
                   if (panier == null) {
                       return [];
                   } else {
                       return JSON.parse(panier);
                   }
               }
               var count = getPanier().length;
               var pan = document.getElementById('pa')
               pan.attributes[2].nodeValue = count
               console.log(pan.attributes[2]);
           </script>
       </nav>
   </div>
</div>
            </div>
          </div>

        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
              <span>
                E commerce
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item active">
                  <a class="nav-link" href="Accueil">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Accueil/admin"> Login Admin</a>
                </li>
             
                <li class="nav-item">
                
                <a class="nav-link" href="Accueil/clientAjoutArgent">Ajouter argent portefeuille</a>
                
               
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Accueil/listerecette">Recettes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Accueil/listepanier">Panier</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Accueil/forminscription">S inscrire</a>
                </li>
             
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>

      

    <!-- Modal Search -->

</header>