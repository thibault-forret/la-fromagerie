<?php

function produit() {
    global $bdd;

    // Voir quand l'id est négatif etc
    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        $request = $bdd->query("SELECT produit.*, tva.taux  FROM produit, tva WHERE produit.id_tva = tva.id AND identifiant='".$_GET['identifiant']."'"); // AND statut  1 ???
        $monProduit = $request->fetch();

        if($monProduit) {
            $idProduit = $monProduit['id'];
            if(isset($_POST['quantite']) && $_POST['quantite']) {
                $quantiteProduit = $_POST['quantite'];
                $monPanier = verifierPanier($_SESSION['idClient']);
                if (!$monPanier) {
                    // Créer un panier
                    $monPanier = creationPanier($_SESSION['idClient']);
                }

                if ($monPanier) {
                    $inPanier = verifierProduitDansPanier($monPanier['id'], $idProduit);
                    if ($inPanier) {
                        ajouterQuantiteAuPanier($inPanier['id'], $idProduit, $quantiteProduit);
                    } else {
                        ajouterProduitAuPanier($monPanier['id'], $idProduit, $quantiteProduit);
                    }

                    $request = $bdd->query("SELECT produit.*, tva.taux  FROM produit, tva WHERE produit.id_tva = tva.id AND identifiant='".$_GET['identifiant']."'"); // AND statut  1 ???
                    $monProduit = $request->fetch();
                }
            }
        }


        // If produit in panier
            // add Quantity
                // add Produit


        require_once('view/inc/inc.head.php');
        require_once('view/inc/inc.header.php');
        monProduit($monProduit); // Affiche un seul produit
    } else {
        $request = $bdd->query("SELECT produit.*, tva.taux FROM produit, tva WHERE produit.id_tva = tva.id AND statut = 1"); // AND statut  1 ???
        $listProduit = $request->fetchAll();

        require_once('view/inc/inc.head.php');
        require_once('view/inc/inc.header.php');
        listProduit($listProduit); // Affiche tous les produits
    }

    require_once('view/inc/inc.footer.php');
}

function monProduit($monProduit) {
    require_once("view/produit/v-monProduit.php");
}

function listProduit($listProduit) {
    require_once("view/produit/v-listProduit.php");
}
