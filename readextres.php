<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<h2>EXTRES</h2>

<div class="container">
<table border="10" align="center" class="table">

  <tr class="info">

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
    $collectionextra = $conn->carstock->extra;
    $car = $collection ->find();


    foreach ($car as $car1) {
        echo "<tr><td>".$car1->_id."</td>";
        echo "<td>".$car1->doors."</td>";
        echo "<td>".$car1->colour."</td>";
        echo "<td>".$car1->car_engine."</td>";
        echo "<td>";
        foreach ($car1->Extra as $extraid){
                    $extraobjectid=new MongoDB\BSON\ObjectId($extraid);
                    $cercar = $collectionextra->find(['_id'=>$extraobjectid]);
                    foreach ($cercar as $nom) {
                            echo "- $nom->nom <br>";
                    }
                }
        echo "</td>";

        echo "<td><button name='cambiar' type='button'><a href='index.php?'> Inici </a></td>";
      }
    }

    ?>

</table>
</html>
