<?php

function paiement() {

	// On récupère la date au format ISO-8601
	$dateTime = date("c");

    $idCommande = $_SESSION['id_commande'];
    $cmd = "24gp94-".$idCommande;

    $montant = $_SESSION['prix_total'] * 100;
    $email = $_SESSION['email'];

    unset($_SESSION['id_commande']);
    unset($_SESSION['prix_total']);
    unset($_SESSION['email']);

    $url_effectue = "https://b2-gp94.kevinpecro.info/accepte";
    $url_refuse = "https://b2-gp94.kevinpecro.info/refuse";
    $url_annule = "https://b2-gp94.kevinpecro.info/annule";
    $url_ipn = "https://b2-gp94.kevinpecro.info/ipn/";

    // Informations concernant le module de paiement du Crédit Agricole

    $pbx_retour = "Mt:M;Ref:R;NumAuto:A;Erreur:E;DateTransac:W;HeureTransac:Q;Carte:j;NumTransac:S";

	// On crée la chaîne à hacher sans URLencodage
	$msg = "PBX_SITE=".
        "&PBX_RANG=".
        "&PBX_IDENTIFIANT=".
        "&PBX_TOTAL=".$montant.
        "&PBX_DEVISE=978".
        "&PBX_CMD=".$cmd.
        "&PBX_PORTEUR=".$email.
        "&PBX_RETOUR=".$pbx_retour.
        "&PBX_EFFECTUE=".$url_effectue.
        "&PBX_REFUSE=".$url_refuse.
        "&PBX_ANNULE=".$url_annule.
        "&PBX_RUF1=POST".
        "&PBX_REPONDRE_A=".$url_ipn.
        "&PBX_HASH=SHA512".
        "&PBX_TIME=".$dateTime;

    // On récupère la clé secrète HMAC 
	$key = "";
	// Si la clé est en ASCII, On la transforme en binaire
	$binKey = pack("H*", $key);
	// On calcule l’empreinte (à renseigner dans le paramètre PBX_HMAC) grâce à la fonction hash_hmac et 
	// la clé binaire
	// On envoie via la variable PBX_HASH l'algorithme de hachage qui a été utilisé (SHA512 dans ce cas)
	$hmac = strtoupper(hash_hmac('sha512', $msg, $binKey));

    require_once('view/inc/inc.head.php');
    require_once('view/inc/inc.header.php');
    require_once('view/paiement/v-paiement.php');
    require_once('view/inc/inc.footer.php');
}

function IPN(){
    $montant = $_POST['Mt'] / 100;
    $refCommande = $_POST['Ref'];
    $numeroAutorisation = $_POST['NumAuto'];
    $codeErreur = $_POST['Erreur'];
    $dateTransac = $_POST['DateTransac'];
    $heureTransac = $_POST['HeureTransac'];
    $carte = $_POST['Carte'];
    $numeroTransac = $_POST['NumTransac'];

    $date = DateTime::createFromFormat('dmY', $dateTransac);
    $dateFormate = $date->format('Y-m-d');

    $dateHeureFormate = $dateFormate." ".$heureTransac;

    global $bdd;

    $request = $bdd->prepare("INSERT INTO `commande_paiement`
        (ref_commande, num_autorisation, num_transac, code_erreur, num_carte, date_transac, montant) 
        VALUES (:ref_commande, :num_autorisation, :num_transac, :code_erreur, :num_carte, :date_transac, :montant)");
    $request->execute(array(
       "ref_commande" => $refCommande,
       "num_autorisation" => $numeroAutorisation,
       "num_transac" => $numeroTransac,
       "code_erreur" => $codeErreur,
       "num_carte" => $carte,
       "date_transac" => $dateHeureFormate,
       "montant" => $montant
    ));
}

