<?php

function paiementAccepte() {
    global $bdd;

    $idClient = $_SESSION['idClient'];

    $monPanier = verifierPanier($idClient);
    $idPanier = $monPanier['id'];

    // Suppression de tout les paniers produits
    $request = $bdd->prepare("DELETE FROM panier_produit WHERE id_panier = :idPanier");
    $request->execute(array('idPanier' => $idPanier));

    // Suppression de tout les paniers produits
    $request = $bdd->prepare("DELETE FROM panier WHERE id = :idPanier");
    $request->execute(array('idPanier' => $idPanier));

    require_once('view/inc/inc.head.php');
    require_once('view/inc/inc.header.php');
    require_once('view/paiement/v-paiement-accepte.php');
    require_once('view/inc/inc.footer.php');
}

function paiementRefuse() {
    require_once('view/inc/inc.head.php');
    require_once('view/inc/inc.header.php');
    require_once('view/paiement/v-paiement-refuse.php');
    require_once('view/inc/inc.footer.php');
}

function paiementAnnule() {
    require_once('view/inc/inc.head.php');
    require_once('view/inc/inc.header.php');
    require_once('view/paiement/v-paiement-annule.php');
    require_once('view/inc/inc.footer.php');
}
