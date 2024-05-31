<main id="mon-produit">

    <div style="width: 100%; height: 100px;background-color: #000"></div>
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Détail du produit</h2>
                <ol>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="/produit">Produits</a></li>
                    <li><?=$monProduit['nom']?></li>
                </ol>
            </div>

        </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="<?=$monProduit['image']?>" alt="">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Informations du produit</h3>
                        <ul>
                            <li><strong>Fromage</strong>: <?=$monProduit['nom']?></li>
                            <li><strong>Prix</strong>: <?=number_format($monProduit['prix'] * $monProduit['taux'], 2)?> €</li>
                            <?php if($monProduit['stock'] !== 0) { ?>
                                <li><strong>Produit en stock</strong>: <?=$monProduit['stock']?></li>
                                <form method="POST" class="d-flex">
                                    <input class="form-control text-center me-3" id="quantite" name="quantite" type="number" min="1" max="<?=$monProduit['stock']?>" value="1" style="max-width: 3rem"/>
                                    <button class="btn " type="submit">
                                        <i class="bi-cart-fill me-1"></i>
                                        Ajouter au panier
                                    </button>
                                </form>
                            <?php } else { ?>
                                <li><u>Rupture de stock</u></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Description du produit</h2>
                        <p>
                            <?=$monProduit['description']?>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
