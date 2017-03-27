<?php
$bdd = new PDO('mysql:host=localhost;dbname=stpaul;charset=utf8', 'root');
$sejoursManager = new SejoursManager($bdd);
$sejours=$sejoursManager->getList();
?>