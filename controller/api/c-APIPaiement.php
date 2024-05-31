<?php

function APIPaiement() {
    if($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        die('Méthode non authorisée');
    }

    if(!isset($_POST['HTTP_AUTHORIZATION']) || $_POST['HTTP_AUTHORIZATION'] !== "SiU5bCE/XCY1WHNGejxoM0ZkN21SLkN5dThrS3Q2VG9FZ0FSWjFOcFZCdnFMMjB4WUlpVzRiVU1HSm5BYVNQZQ==") {
        http_response_code(401);
        die('Non autorisé');
    }

    global $bdd;

    $request = $bdd->query("SELECT * FROM commande_paiement");
    $listePaiement = $request->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($listePaiement);
}

