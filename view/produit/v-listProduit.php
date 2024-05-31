<!-- ======= Portfolio Section ======= -->
<section id="produits" class="portfolio">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h3 class="section-title black-title">Liste des produits</h3>
            <p class="section-description">Découvrez notre sélection de produits exceptionnels.</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach($listProduit as $unProduit): ?>
                <a href="produit/<?=$unProduit['identifiant'] ?>/" class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="<?= $unProduit['image'] ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4><?= $unProduit['nom']?></h4>
                        <p><?= number_format($unProduit['prix'] * $unProduit['taux'], 2) ?> €</p>
                    </div>
                </a>
            <?php endforeach ?>
        </div>

    </div>
</section><!-- End Portfolio Section -->

