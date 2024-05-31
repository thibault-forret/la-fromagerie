<?php

session_start();

date_default_timezone_set("Europe/Paris");

require_once('model/model.php');
require_once('controller/c-accueil.php');
require_once('controller/actualite/c-actualite.php');
require_once('controller/produit/c-produit.php');
require_once('controller/panier/c-panier.php');
require_once('controller/commander/c-commander.php');
require_once('controller/paiement/c-paiement.php');
require_once('controller/paiement/c-paiements.php');

require_once('controller/api/c-APICommande.php');
require_once('controller/api/c-APIPaiement.php');
require_once('controller/api/c-APIListe.php');


$_SESSION['idClient'] = 1;

$monPanier = verifierPanier($_SESSION['idClient']);

if(isset($_GET['page']) && $_GET['page']) {
   switch ($_GET['page']) {
       case "produit": produit(); break;
       case "actualite": actualite(); break;
       case "panier": panier(); break;
       case "commander": commander(); break;
       case "paiement" : paiement(); break;
       case "accepte" : paiementAccepte(); break;
       case "refuse" : paiementRefuse(); break;
       case "annule" : paiementAnnule(); break;
       case "ipn" : IPN(); break;

       default: accueil(); break;
   }
}
elseif(isset($_GET['pageAPI']) && $_GET['pageAPI']) {
    switch ($_GET['pageAPI']) {
        case "commande": APICommande(); break;
        case "paiement": APIPaiement(); break;
        default : APIListe(); break;
    }
}
else {
    accueil();
}