<?php

require_once __DIR__ . '/vendor/autoload.php';
if($_SERVER["REQUEST_METHOD"]=="GET"){
if ($_GET["_id"]!=null){

  $_id=$_GET["_id"];
  $doors=$_GET["doors"];
  $colour=$_GET["colour"];
  $engine=$_GET["engine"];
  $extra=$_GET["extra"];

  $conn= new MongoDB\Client("mongodb://localhost:27017");

  $db=$conn->carstock;

  $Resultat =$db->cars->updateOne(['_id' => $_id], ['$push' => ['Extra' => $extra]]);
}
}

echo "<H1>"."AFEGIT"."</H1>";

echo "<button name='extres' type='button'><a href=readextres.php>" . "INICI" . "</a>"
?>
