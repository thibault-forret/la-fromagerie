<?php

function panier() {
    global $bdd;

    $monPanier = verifierPanier($_SESSION['idClient']);
    if(!$monPanier) {
        $lstProduitPanier = array();
    }
    else {
        $idPanier = $monPanier['id'];

        $request = $bdd->query("SELECT produit.*, panier_produit.*, tva.taux FROM produit, panier_produit, tva
         WHERE id_produit = produit.id AND tva.id = produit.id_tva AND id_panier = $idPanier");
        $lstProduitPanier = $request->fetchAll(PDO::FETCH_ASSOC);

        $totalPanier = 0;
    }

    require_once('view/inc/inc.head.php');
    require_once('view/inc/inc.header.php');
    require_once('view/panier/v-panier.php');
    require_once('view/inc/inc.footer.php');
}

function verifierPanier($idClient) {
    global $bdd;

    $request = $bdd->query("
        SELECT * FROM panier
        WHERE id_client = $idClient");
    $unPanier = $request->fetch(PDO::FETCH_ASSOC);

    if($unPanier) return $unPanier;
    else return false;
}

function creationPanier($idClient) {
    global $bdd;

    $request = $bdd->prepare("
        INSERT INTO panier(id_client, date_creation)
        VALUES (:idClient, :dateCreation)");
    $request->execute(
        array(
            "idClient" => $idClient,
            "dateCreation" => date('Y-m-d H:i:s')
        )
    );

    return verifierPanier($idClient);
}

function verifierProduitDansPanier($idPanier, $idProduit) {
    global $bdd;

    $request = $bdd->query("
        SELECT * FROM panier_produit
        WHERE id_panier = $idPanier AND id_produit = $idProduit");
    $inPanier = $request->fetch(PDO::FETCH_ASSOC);

    if($inPanier) return $inPanier;
    else false;
}

function ajouterQuantiteAuPanier($idPanierProduit, $idProduit, $quantiteProduit) {
    global $bdd;

    $request = $bdd->prepare("
        UPDATE panier_produit SET quantite = quantite + :quantiteProduit 
        WHERE id = :idPanierProduit
    ");
    $request->execute(
        array(
            "idPanierProduit" => $idPanierProduit,
            "quantiteProduit" => $quantiteProduit
        )
    );

    if($request) {
        $success = removeQuantiteStockProduit($idProduit, $quantiteProduit);
        return array(
            "ajouterQuantitePanierSuccess" => $request,
            "removeQuantiteStockSuccess" => $success);
    }
    else return $request;
}

function ajouterProduitAuPanier($idPanier, $idProduit, $quantiteProduit) {
    global $bdd;

    $request = $bdd->prepare("
        INSERT INTO panier_produit (id_panier, id_produit, quantite) 
        VALUES (:idPanier, :idProduit, :quantiteProduit)
    ");
    $request->execute(
        array(
            "idPanier" => $idPanier,
            "idProduit" => $idProduit,
            "quantiteProduit" => $quantiteProduit
        )
    );

    if($request) {
        $success = removeQuantiteStockProduit($idProduit, $quantiteProduit);
        return array(
            "ajouterProduitSuccess" => $request,
            "removeQuantiteStockSuccess" => $success);
    }
    else return $request;
}

function removeQuantiteStockProduit($idProduit, $quantiteToRemove) {
    global $bdd;

    $request = $bdd->query("
        UPDATE produit SET stock = stock - $quantiteToRemove
        WHERE id = $idProduit
    ");

    return $request;
}