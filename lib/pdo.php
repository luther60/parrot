<?php



require '/parrot/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/');
$dotenv->load();

$dbhost = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$dbuser = $_ENV['DB_USER'];
$dbpassword = $_ENV['DB_PASSWORD'];
echo "<br>";
echo("hello");
try {
    $pdo = new PDO("mysql:$dbhost;dbname:$dbname;charset=utf8mb4",$dbuser,$dbpassword);
    echo "<br>";
    echo "Connexion reussi!!";
}
catch (PDOException $e) {
    echo "Erreur de connexion".$e ->getMessage();
}

