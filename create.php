<?php
require_once __DIR__ . '/vendor/autoload.php';

if($_SERVER["REQUEST_METHOD"]=="GET"){
  //As the _id is the primary key, it cannot be null o empty
  if ($_GET["_id"]!=null && $_GET["_id"]!=""){
    //create vars with values
    $_id = $_GET["_id"];
    $colour = $_GET["colour"];
    $doors = $_GET["doors"];
    $car_engine = $_GET["engine"];

    $conn= new MongoDB\Client("mongodb://localhost:27017");
    $db=$conn->carstock;
    $db->cars->insertOne([
      "_id"=>$_id,
      "colour"=>$colour,
      "doors"=>$doors,
      "car_engine"=>$car_engine]);
  }
}
echo "<H1>"."CREAT"."</H1>";

?>
<html>
<body>
<!--we are using GET method to see de parameters in the url-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
<p>Car registration plate (Matrícula): <input type="text" name="_id"></p>
<p>Colour: <input type="text" name="colour"></p>
<p>Number of doors: <input type="text" name="doors"></p>
<p>Engine (Motor): <input type="text" name="engine"></p>
<input type="submit">
</form>
<button name='extres' type='button'><a href=index.php> INICI </a>
</body>
</html>
