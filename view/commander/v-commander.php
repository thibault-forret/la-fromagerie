<div style="width: 100%; height: 100px;background-color: #000"></div>

<div class="container mt-5">
    <h2 class="text-center mb-4">Formulaire de Commande</h2>

    <div class="card mt-4 mb-4">
        <div class="card-header bg-black text-white">Votre commande</div>
        <div class="card-body ">
            <div class="row">

                <?php
                foreach ($lstProduitPanier as $unProduit):
                    $prixTTC = number_format($unProduit['prix']*$unProduit['taux'],2);
                ?>
                    <div class="col-md-4">
                        <div class="media d-flex flex-column align-items-center justify-content-center">
                            <img src="<?=$unProduit['image']; ?>" class="mr-3" alt="Image du produit" width="200">
                            <div class="media-body d-flex flex-column align-items-center">
                                <h5 class="mt-0"><?= $unProduit['nom']; ?></h5>
                                <p>Quantité: <?= $unProduit['quantite']; ?></p>
                                <p>Prix : <?=number_format($prixTTC*$unProduit['quantite'],2)?> €</p>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>

    <form method="POST" action="">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="card">
                    <div class="card-header bg-black text-white">Informations de l'Utilisateur</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="telephone">Téléphone</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Téléphone" required>
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" required>
                        </div>
                        <div class="form-group">
                            <label for="complementAdresse">Complément d'Adresse</label>
                            <input type="text" class="form-control" id="complementAdresse" name="complementAdresse" placeholder="Complément d'Adresse">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="codePostal">Code Postal</label>
                                <input type="text" class="form-control" id="codePostal" name="codePostal" placeholder="Code Postal" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ville">Ville</label>
                                <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-black text-white">Informations de Livraison</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nomLivraison">Nom de Livraison</label>
                            <input type="text" class="form-control" id="nomLivraison" name="nomLivraison" placeholder="Nom de Livraison" required>
                        </div>
                        <div class="form-group">
                            <label for="prenomLivraison">Prenom de Livraison</label>
                            <input type="text" class="form-control" id="prenomLivraison" name="prenomLivraison" placeholder="Prenom de Livraison" required>
                        </div>
                        <div class="form-group">
                            <label for="emailLivraison">Email de Livraison</label>
                            <input type="email" class="form-control" id="emailLivraison" name="emailLivraison" placeholder="Email de Livraison" required>
                        </div>
                        <div class="form-group">
                            <label for="telephoneLivraison">Téléphone de Livraison</label>
                            <input type="tel" class="form-control" id="telephoneLivraison" name="telephoneLivraison" placeholder="Téléphone de Livraison" required>
                        </div>
                        <div class="form-group">
                            <label for="adresseLivraison">Adresse de Livraison</label>
                            <input type="text" class="form-control" id="adresseLivraison" name="adresseLivraison" placeholder="Adresse de Livraison" required>
                        </div>
                        <div class="form-group">
                            <label for="complementAdresseLivraison">Complément d'Adresse de Livraison</label>
                            <input type="text" class="form-control" id="complementAdresseLivraison" name="complementAdresseLivraison" placeholder="Complément d'Adresse de Livraison">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="codePostalLivraison">Code Postal de Livraison</label>
                                <input type="text" class="form-control" id="codePostalLivraison" name="codePostalLivraison" placeholder="Code Postal de Livraison" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="villeLivraison">Ville de Livraison</label>
                                <input type="text" class="form-control" id="villeLivraison" name="villeLivraison" placeholder="Ville de Livraison" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 mb-4">
            <input class="btn btn-dark" type="submit" name="valider_commande" value="Confirmer la commande">
        </div>
    </form>
</div>