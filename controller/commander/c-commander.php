<?php

function commander()
{
    global $bdd;

    $idClient = $_SESSION['idClient'];

    $monPanier = verifierPanier($_SESSION['idClient']);
    $idPanier = $monPanier['id'];

    if (isset($_POST['valider_commande']) && $_POST['valider_commande']) {
        // Récupérer données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];
        $complementAdresse = $_POST['complementAdresse'];
        $codePostal = $_POST['codePostal'];
        $ville = $_POST['ville'];
        $nomLivraison = $_POST['nomLivraison'];
        $prenomLivraison = $_POST['prenomLivraison'];
        $emailLivraison = $_POST['emailLivraison'];
        $telephoneLivraison = $_POST['telephoneLivraison'];
        $adresseLivraison = $_POST['adresseLivraison'];
        $complementAdresseLivraison = $_POST['complementAdresseLivraison'];
        $codePostalLivraison = $_POST['codePostalLivraison'];
        $villeLivraison = $_POST['villeLivraison'];

        //inserer données dans BDD
        $request = $bdd->prepare(
            "INSERT INTO commande (id_client, nom, prenom, email, telephone, 
                      adresse, complement, code_postal, ville, nom_livraison, prenom_livraison, email_livraison, telephone_livraison, 
                      adresse_livraison, complement_livraison, code_postal_livraison, ville_livraison, date_creation, statut)
         VALUES (:idClient, :nom, :prenom, :email, :telephone, :adresse, :complementAdresse, 
                 :codePostal, :ville, :nomLivraison, :prenomLivraison, :emailLivraison, :telephoneLivraison, :adresseLivraison, 
                 :complementAdresseLivraison, :codePostalLivraison, :villeLivraison, :dateCreation, :statut)"
        );
        $request->execute(array(
            'idClient' => $idClient,
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'telephone' => $telephone,
            'adresse' => $adresse,
            'complementAdresse' => $complementAdresse,
            'codePostal' => $codePostal,
            'ville' => $ville,
            'nomLivraison' => $nomLivraison,
            'prenomLivraison' => $prenomLivraison,
            'emailLivraison' => $emailLivraison,
            'telephoneLivraison' => $telephoneLivraison,
            'adresseLivraison' => $adresseLivraison,
            'complementAdresseLivraison' => $complementAdresseLivraison,
            'codePostalLivraison' => $codePostalLivraison,
            'villeLivraison' => $villeLivraison,
            "dateCreation" => date("Y-m-d H:i:s"),
            "statut" => 1
        ));

        $request = $bdd->query("SELECT * FROM commande
         WHERE id_client = $idClient ORDER BY commande.id DESC LIMIT 1");
        $maCommande = $request->fetch(PDO::FETCH_ASSOC);

        $request = $bdd->query("SELECT produit.*, panier_produit.*, tva.taux FROM produit, panier_produit, tva
         WHERE id_produit = produit.id AND tva.id = produit.id_tva AND id_panier = $idPanier");
        $listProduitPanier = $request->fetchAll(PDO::FETCH_ASSOC);

        // Insertion des valeurs dans commande_produit
        $request = $bdd->prepare("INSERT INTO commande_produit(id_commande, id_produit, quantite, prix_unitaire, id_tva) 
                VALUES (:idCommande, :idProduit,:quantite, :prixUnitaire, :idTVA)");

        $prixTotal = 0;

        foreach ($listProduitPanier as $produit) {
            $prixTotal += $produit['quantite'] * $produit['prix'] * $produit['taux'];
            $request->execute(
                array (
                    "idCommande" => $maCommande['id'],
                    "idProduit" => $produit['id_produit'],
                    "quantite" => $produit['quantite'],
                    "prixUnitaire" => $produit['prix'],
                    "idTVA" => $produit['id_tva']
                )
            );
        }

        // DELETE tout les paniers

        $_SESSION['id_commande'] = $maCommande['id'];
        $_SESSION['email'] = $email;
        $_SESSION['prix_total'] = $prixTotal;

        // Redirige vers confirmation commande
        header("Location: /paiement");
        exit();
    }

    $request = $bdd->query("SELECT produit.*, panier_produit.*, tva.taux FROM produit, panier_produit, tva
         WHERE id_produit = produit.id AND tva.id = produit.id_tva AND id_panier = $idPanier");
    $lstProduitPanier = $request->fetchAll(PDO::FETCH_ASSOC);

    require_once('view/inc/inc.head.php');
    require_once('view/inc/inc.header.php');
    require_once('view/commander/v-commander.php');
    require_once('view/inc/inc.footer.php');
}