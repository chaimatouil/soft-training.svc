<?php
$req =$db -> prepare ("SELECT * FROM products ");

$req -> execute();

$rows = $req -> fetchAll();