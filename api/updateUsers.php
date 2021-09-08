<?php
require 'commun_services.php';

if (
    !isset($_REQUEST["id"]) || !isset($_REQUEST["Nom_societe"]) || !isset($_REQUEST["Abreviations"]) || !isset($_REQUEST["Adresse"]) || !isset($_REQUEST["Tel"])
    || !isset($_REQUEST["Email"]) || !isset($_REQUEST["Secteur"])
) {
    produceErrorRequest();
    return;
}
if (
    empty($_REQUEST["id"]) || empty($_REQUEST["Nom_societe"]) || empty($_REQUEST["Abreviations"]) || empty($_REQUEST["Adresse"]) || empty($_REQUEST["Tel"])
    || empty($_REQUEST["Email"]) || empty($_REQUEST["Secteur"])
) {
    produceErrorRequest();
    return;
}

$user = new UserEntity();
$user->setIdUser($_REQUEST["id"]);
$user->setNom_societe($_REQUEST["Nom_societe"]);
$user->setAbreviations(($_REQUEST["Abreviations"]));
$user->setAdresse($_REQUEST["Adresse"]);
$user->setTel($_REQUEST["Tel"]);
$user->setEmail($_REQUEST["email"]);
$user->setSecteur($_REQUEST["Secteur"]);

try {
    $data = $db->updateUsers($user);

    if ($data) {
        produceResult('modification réussie ;');
    } else {
        produceError("Echec de la mise à jour. Merci de réessayer !");
    }
} catch (Exception $th) {
    produceError($th->getMessage());
}