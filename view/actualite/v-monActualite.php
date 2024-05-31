<main id="mon-actualite">

    <div style="width: 100%; height: 100px;background-color: #000"></div>
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Détail de l'actualité</h2>
                <ol>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="/actualite">Actualités</a></li>
                    <li><?=$monActu['titre']?></li>
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
                                <img src="<?= $monActu['image'] ?>" alt="">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Informations de l'actualité</h3>
                        <ul>
                            <li><strong>Titre</strong>: <?=$monActu['titre']?></li>
                            <li><strong>Auteur</strong>: </li>
                            <li><strong>Date publication</strong>: <?= date('d/m/y', strtotime($monActu['date_creation'])) ?></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Description de l'actualité</h2>
                        <p>
                            <?=$monActu['description']?>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
