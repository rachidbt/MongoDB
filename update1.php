<?php
require_once __DIR__ . '/vendor/autoload.php';
if($_SERVER["REQUEST_METHOD"]=="GET"){
if ($_GET["_id"]!=null){

  $_id=$_GET["_id"];
  $doors=$_GET["doors"];
  $colour=$_GET["colour"];
  $engine=$_GET["engine"];

  $conn= new MongoDB\Client("mongodb://localhost:27017");

  $db=$conn->carstock;

  $db->cars->updateone(['_id' => $_id],['$set' => ['doors' => $doors,'colour' => $colour,'car_engine' => $engine]]);

}
}
echo "<H1>"."ACTUALITZAT"."</H1>";
?>
<html>
<button name='extres' type='button'><a href=index.php> INICI </a>
</html>
