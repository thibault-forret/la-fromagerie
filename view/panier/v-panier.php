<div style="width: 100%; height: 100px;background-color: #000"></div>

<section class="min-vh-100" id="panier" style="background-color: #f4f4f4;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <p><span class="h2">Panier </span><span class="h4">(<?= count($lstProduitPanier) ?> produit(s) dans le panier)</span></p>

                <div class="card mb-4">
                    <?php if($lstProduitPanier != null): ?>

                    <?php foreach($lstProduitPanier as $unProduit):
                        $prixTTC = number_format($unProduit['prix'] * $unProduit['taux'], 2);
                        $totalPanier += $prixTTC * $unProduit['quantite'];
                    ?>
                    <div class="card-body p-4">

                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="<?= $unProduit['image'] ?>"
                                     class="img-fluid" alt="">
                            </div>
                            <div class="col-md-2 d-flex">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">Nom</p>
                                    <p class="lead fw-normal mb-0"><?= $unProduit['nom'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">Quantité</p>
                                    <p class="lead fw-normal mb-0"><?= $unProduit['quantite'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">Prix unitaire</p>
                                    <p class="lead fw-normal mb-0"><?= $prixTTC ?> €</p>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">Prix total</p>
                                    <p class="lead fw-normal mb-0"><?= number_format($prixTTC * $unProduit['quantite'], 2) ?> €</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <?php else: ?>
                        <div class="card-body p-4 d-flex flex-column justify-content-center align-items-center">
                            <div>Aucun produit dans le panier</div>
                            <a href="produit">Voir les produits</a>
                        </div>
                    <?php endif ?>
                </div>

                <?php if($lstProduitPanier != null): ?>

                <div class="card mb-5">
                    <div class="card-body p-4">

                        <div class="float-end">
                            <p class="mb-0 me-5 d-flex align-items-center">
                                <span class="small text-muted me-2">Total du panier</span>
                                <span class="lead fw-normal"><?= number_format($totalPanier, 2) ?> €</span>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="/produit" class="btn me-2">Voir les produits</a>
                    <a href="/commander" class="btn btn-dark">Commander</a>
                </div>

                <?php endif ?>

            </div>
        </div>
    </div>
</section>