<?php

require_once 'config.php';

$bdd = new PDO("mysql:host=localhost;dbname=multi-p", $user,$password);


$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
