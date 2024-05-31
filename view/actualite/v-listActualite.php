<!-- ======= Portfolio Section ======= -->
<section id="produits" class="portfolio">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h3 class="section-title black-title">Liste des actualités</h3>
            <p class="section-description">Découvrez les dernières nouvelles.</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach($listActu as $uneActu): ?>
                <a href="actualite/<?=$uneActu['id']?>/" class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="<?= $uneActu['image'] ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4><?=$uneActu['titre']?></h4>
                        <p><?=substr($uneActu["description"], 0, 200)?></p>
                    </div>
                </a>
            <?php endforeach ?>
        </div>

    </div>
</section><!-- End Portfolio Section -->

