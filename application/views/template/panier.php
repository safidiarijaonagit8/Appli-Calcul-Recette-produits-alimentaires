<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Panier
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        
                           
                        

        <div class="header-cart-content flex-w js-pscroll">

            <ul class="header-cart-wrapitem w-full " id="panier">
                <li class="header-cart-item flex-w flex-t m-b-12">

                </li>
            </ul>
            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40" id="total">

                </div>
                <form action="<?= site_url('Accueil/formLoginClientPaiement') ?>" method="post">
                            <input id="don" type="hidden" name="donne" value="">
                            <input id="tt" type="hidden" name="total">
                            <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Payer
                            </button>
                        </form>
                        <form action="" method="post">
                                <div class="flex-w flex-m m-r-20 m-tb-5">
                                    <button onclick="supprimer()" type="submit" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                        Supprimer tout
                                    </button>

                                </div>
                            </form>

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
                    function supprimer() {
                      localStorage.removeItem('panier')
                    }

                    function getTotal() {
                        let data = getPanier();
                        let val = 0;
                        for (let i = 0; i < data.length; i++) {
                            val += (data[i].prix * data[i].quantite)
                        }
                        return val
                    }
                    document.getElementById('total').innerHTML = "Total : " + getTotal() + " Ar";
                    build(getPanier());
                    document.getElementById('don').value = JSON.stringify(getPanier());
                    document.getElementById('tt').value = getTotal();

                    function build(data) {
                        var panier = document.getElementById('panier');
                        for (let i = 0; i < data.length; i++) {
                            var row = `
                            <li class=" header-cart-item flex-w flex-t m-b-12">
                                <div class="header-cart-item-img">
                                    <img src="<?php echo site_url() ?>/assets/images/a/` + data[i].image + `" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt p-t-8">
                                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        ` + data[i].nom + `
                                    </a>

                                    <span class="header-cart-item-info">
                                        ` + data[i].quantite + ` x ` + data[i].prix + ` Ar => Total = ` + (data[i].prix * data[i].quantite) + ` Ar
                                    </span>
                                    <form action="<?php echo site_url("Accueil/supprimerPanier") ?>" method="post">
                                        <input type="hidden" name="idP" value="` + data[i].id + `">
                                        <input type="submit"  value="delete">
                                    </form>
                                </div>
                            </li>
                    `;
                            panier.innerHTML += row;
                        }
                    }
                </script>
               
            </div>
        </div>
    </div>
</div>