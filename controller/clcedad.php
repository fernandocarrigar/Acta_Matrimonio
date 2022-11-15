<?php

// include_once('var_globals.php');

$edad_diffH = date_diff(date_create($fch_nacH), date_create($fch_registro));
$edad_diffM = date_diff(date_create($fch_nacM), date_create($fch_registro));

$edadH = $edad_diffH->format('%y');
$edadM = $edad_diffM->format('%y');

?>