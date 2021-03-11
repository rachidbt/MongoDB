<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<h2>Read Form</h2>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
<p>Car registration plate (Matrícula): <input type="text" name="_id" value="" ></p>
<p>Colour: <input type="text" name="colour" value="" ></p>
<p>Number of doors: <input type="text" name="doors" value="" ></p>
<p>Engine (Motor): <input type="text" name="engine" value="" ></p><br>


<input type="submit"><br/><br/><button><a href="createForm.php">Crear</a></button>

<div class="container">
<table border="10" align="center" class="table">

  <tr class="success">

    <th>ID</th>

    <th>DOORS</th>

    <th>COLOUR</th>

    <th>CAR ENGINE</th>

    <th>EDITAR</th>

    <th>ELIMINAR</th>

    <th>EXTRES</th>

    <th>CREAR</th>

  </tr>
    <?php

    error_reporting(0);
    require_once __DIR__ . '/vendor/autoload.php';
    if($_SERVER["REQUEST_METHOD"]=="GET"){
    if ($_GET["_id"]!=null){

    $_id = $_GET["_id"];

    $conn= new MongoDB\Client("mongodb://localhost:27017");

    $collection = $conn->carstock->cars;

    $cars = $collection->find(['_id' => $_id]);

    foreach ($cars as $car) {
      echo "<tr ><td>".$car->_id."</td>";
      echo "<td>".$car->doors."</td>";
      echo "<td>".$car->colour."</td>";
      echo "<td>".$car->car_engine."</td>";
      echo "<td><button name='cambiar' type='button'><a href='updateForm.php?plate=".$car->_id."'> EDITAR </a></td>";
      echo "<td><button name='eliminar' type='button'><a href=delete.php?plate=".$car->_id."> BORRAR </a></td>";
      echo "<td><button name='extres' type='button'><a href=extres2.php?plate=".$car->_id."> EXTRES </a></td>";
      echo "<td><button name='crear' type='button'><a href=createForm.php> CREAR </a></td></tr>";
    }
    }



    elseif($_GET["_id"]==null){

    $_id = $_GET["_id"];

    $conn= new MongoDB\Client("mongodb://localhost:27017");

    $collection = $conn->carstock->cars;

    $read = $collection->find();



    foreach ($read as $car) {
        echo "<tr><td>".$car->_id."</td>";
        echo "<td>".$car->doors."</td>";
        echo "<td>".$car->colour."</td>";
        echo "<td>".$car->car_engine."</td>";
        echo "<td><button name='cambiar' type='button'><a href='updateForm.php?plate=".$car->_id."'> EDITAR </a></td>";
        echo "<td><button name='eliminar' type='button'><a href=delete.php?plate=".$car->_id."> BORRAR </a></td>";
        echo "<td><button name='extres' type='button'><a href=extres2.php?plate=".$car->_id."> EXTRES </a></td>";
        echo "<td><button name='crear' type='button'><a href=createForm.php> CREAR </a></td></tr>";
      }
    }

    }

    ?>
</div>
</table>
</html>
