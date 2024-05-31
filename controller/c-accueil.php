<?php

function accueil() {

    // Traitement du contenu

    // Récupérer nombre de produit
    global $bdd;
    $request = $bdd->query('SELECT COUNT(*) FROM produit');
    $nombreProduits = $request->fetchColumn();

    require_once('view/inc/inc.head.php');
    require_once('view/inc/inc.header.php');
    require_once('view/v-accueil.php');
    require_once('view/inc/inc.footer.php');
}
