<html>
<h2>EXTRES</h2>

<table border="10" align="center">

  <tr>

    <th>ID</th>

    <th>DOORS</th>

    <th>COLOUR</th>

    <th>CAR ENGINE</th>

    <th>EXTRA</th>

    <th>INICI</th>

  </tr>
    <?php
    require_once __DIR__ . '/vendor/autoload.php';
    if($_SERVER["REQUEST_METHOD"]=="GET"){

    $conn= new MongoDB\Client("mongodb://localhost:27017");

    $collection = $conn->carstock->cars;

    $car = $collection ->find();


    foreach ($car as $car1) {
        echo "<tr><td>".$car1->_id."</td>";
        echo "<td>".$car1->doors."</td>";
        echo "<td>".$car1->colour."</td>";
        echo "<td>".$car1->car_engine."</td>";
        echo "<td>".$car1->Extra."</td>";
        echo "<td><button name='cambiar' type='button'><a href='index.php?'> Inici </a></td>";
      }
    }

    ?>

</table>
</html>
