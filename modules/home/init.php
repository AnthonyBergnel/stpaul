<?php
$bdd=include '../includes/connect.php';
$sejoursManager=new SejoursManager($bdd);
$sejours=$sejoursManager->getList();
?>