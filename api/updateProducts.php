<?php
require 'commun_services.php';

if (
    !isset($_REQUEST["idProduct"]) || !isset($_REQUEST["name"]) || !isset($_REQUEST["domaine_realise"]) || !isset($_REQUEST["tache_realisee"])
    ||  !isset($_REQUEST["image"])
) {
    produceErrorRequest();
    return;
}
if (
    empty($_REQUEST["idProduct"]) || empty($_REQUEST["name"]) || empty($_REQUEST["domaine_realise"]) || empty($_REQUEST["tache_realisee"])
    || empty($_REQUEST["image"])
) {
    produceErrorRequest();
    return;
}

$product = new ProductEntity();
$product->setIdProduct($_REQUEST["idProduct"]);
$product->setName($_REQUEST['name']);
$product->setDomaine_realise($_REQUEST['domaine_realise']);
$product->setTache_realisee($_REQUEST['tache_realisee']);
$product->setImage($_REQUEST['image']);

try {
    $data = $db->updateProduct($product);

    if ($data) {
        produceResult('modification réussie ;');
    } else {
        produceError("Echec de la mise à jour. Merci de réessayer !");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}