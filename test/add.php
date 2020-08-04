<?php 
    require_once  "../bootstrap.php";

    $agence = new Agence();
    $f = new Client();
    $agence->setNom("Agence2");
    $entityManager->persist($agence);
    $entityManager->flush();
    echo  $agence->getId();
?>