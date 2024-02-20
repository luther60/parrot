<?php

require '/parrot/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/');
$dotenv->load();

$dbhost = $_ENV["DB_HOST"];
$dbname = $_ENV["DB_NAME"];
$dbuser = $_ENV["DB_USER"];
$dbpassword = $_ENV["DB_PASSWORD"];

try {
    $pdo=new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpassword,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
}
catch (PDOException $e) {
    echo "Erreur 404".$e ->getMessage();
}



