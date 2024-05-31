<?php

function actualite() {
    global $bdd;
    // Traitement du contenu

    require_once('view/inc/inc.head.php');
    require_once('view/inc/inc.header.php');

    if (isset($_GET['id']) && $_GET['id']) {
        $request = $bdd->query("SELECT * FROM actualite WHERE id='".$_GET['id']."'"); // AND statut  1 ???
        $monActu = $request->fetch();
        monActualite($monActu); // Affiche une seule actualité
    } else {
        $request = $bdd->query("SELECT * FROM actualite WHERE statut = 1");
        $listActu = $request->fetchAll();
        listActualite($listActu); // Affiche toutes les actualités
    }

    require_once('view/inc/inc.footer.php');
}

function monActualite($monActu) {
    require_once("view/actualite/v-monActualite.php");
}

function listActualite($listActu) {
    require_once("view/actualite/v-listActualite.php");
}