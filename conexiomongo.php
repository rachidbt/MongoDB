<?php

require_once __DIR__ . '/vendor/autoload.php';

$conn= new MongoClient( "mongodb://example.com:65432" );
$db=$conn->cars;
$db->cotxes->insertOne();
$db->cotxes->insertOne();


?>
