<?php
require_once __DIR__ . '/vendor/autoload.php';

$conn= new MongoDB\Client("mongodb://localhost:27017");

$collection = $conn->carstock->cars;

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
<h2>Update Form</h2>
<form action="update1.php" method="get">
<p>Car registration plate (Matrícula): <input type="text" name="_id" value="<?php  echo $car->_id?>" readonly></p>
<p>Colour: <input type="text" name="colour" value="<?php  echo $car->colour?>"></p>
<p>Number of doors: <input type="text" name="doors" value="<?php  echo $car->doors?>"></p>
<p>Engine (Motor): <input type="text" name="engine" value="<?php  echo $car->car_engine?>"></p><br><br>
<input type="submit">

</form>
</body>
</html>
