<?php 
    require_once  "../bootstrap.php";

    $agence = new Agence();
    $agence->setNom("Agence2");
    $entityManager->persist($agence);
    $entityManager->flush();
    echo  $agence->getId();
?>