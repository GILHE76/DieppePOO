<?php
date_default_timezone_set("Europe/Paris");

include "./functions/classAutoLoader.php";
spl_autoload_register('classAutoLoader');

$voiture = new Berline("citroen", "saxo");

var_dump($voiture);