<?php
require 'commun_services.php';

if (
    !isset($_REQUEST['name']) || !isset($_REQUEST['domaine realise']) || !isset($_REQUEST['tache realisee']) ||
    !isset($_REQUEST['image'])
) {
    produceErrorRequest();
    return;
}

if (
    empty($_REQUEST['name']) || empty($_REQUEST['domaine realise']) || empty($_REQUEST['tache realisee']) ||
    empty($_REQUEST['image'])
) {
    produceErrorRequest();
    return;
}

$product = new ProductEntity();
$product->setName($_REQUEST['name']);
$product->setDomaine_realise($_REQUEST['domaine realise']);
$product->setTache_realisee($_REQUEST['tache realisee']);
$product->setImage($_REQUEST['image']);


try {
    $data = $db->createProduct($product);
    if ($data) {
        setLastInsertId($data);
        produceResult("Produit enrégistré avec succès !");
    } else {
        produceError("Problème rencontré lors de l'enregistrement");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}