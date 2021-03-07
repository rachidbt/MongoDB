<?php
require_once __DIR__ . '/vendor/autoload.php';

$conn= new MongoDB\Client("mongodb://localhost:27017");

$collection = $conn->carstock->cars;
$collection1 = $conn->carstock->extra;


$_id = $_GET["plate"];

$cars=$collection->find(['_id' => $_id]);
foreach ($cars as $car) {
   $car->_id."<br>";
   $car->doors."<br>";
   $car->colour."<br>";
   $car->car_engine."<br>";
}
?>
<html>
<body>
<h2>Extres Form</h2>
<form action="insertextres2.php" method="get">
  <p>Car registration plate (Matrícula): <input type="text" name="_id" value="<?php  echo $car->_id?>" readonly></p>
  <p>Colour: <input type="text" name="colour" value="<?php  echo $car->colour?>" readonly></p>
  <p>Number of doors: <input type="text" name="doors" value="<?php  echo $car->doors?>" readonly></p>
  <p>Engine (Motor): <input type="text" name="engine" value="<?php  echo $car->car_engine?>" readonly></p><br>

  <legend>Extres per elegir</legend>
    <select name="extra">
      <?php  $extra=$collection1->find();
    foreach ($extra as $extra1) {
echo "<option  value='$extra1->_id'> $extra1->nom </option>";}
?>
      <!--<option value="aire"> Aire Acondicionat <br/></option>
      <option value="roda"> Roda de repost <br/></option>
      <option value="android"> Android/Apple Car <br/></option>
      <option value="sensor"> Sensor de Aparcament <br/></option>
      <option value="frenada"> Frenada Automatic </p></option>-->
    </select><br/><br/>

<input type="submit">

</form>
</body>
</html>
