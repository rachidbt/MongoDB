<?php
require_once __DIR__ . '/vendor/autoload.php';

$_id=$_GET['plate'];

$conn= new MongoDB\Client("mongodb://localhost:27017");

$db=$conn->carstock;

$db->cars->deleteone(['_id'=>$_id]);

echo "<H1>"."ELIMINAT"."</H1>";
?>
<html>
<body>
<button name='extres' type='button'><a href=index.php> INICI </a>
</body>
</html>
