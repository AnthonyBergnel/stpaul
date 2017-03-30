<?php
include 'modules/includes/connect.php';
$sejoursManager=new SejoursManager($bdd);
$sejours=$sejoursManager->getList();
?>