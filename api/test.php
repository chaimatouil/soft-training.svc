<?php


require 'commun_services.php';
for ($i = 0; $i < 20; $i++) {
    $user = new UserEntity();
    $user->setNom_societe("soft&training");
    $user->setAbreviations("ST");
    $user->setAdresse("ezzahra " . $i);
    $user->setTel("89789787987  " . $i);
    $user->setEmail("NajouaBelhaj" . $i . "@gmail.com");
    $user->setSecteur("private");
    //$data = $db->createUser($user);
}