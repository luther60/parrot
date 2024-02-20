<?php
require_once __DIR__."/../super/header_super.php";
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/config.php";
require_once __DIR__."/../lib/pdo.php";

$vehicle = false;
$errors = [];
$messages = [];

//On verifie si il a une requete id
if(isset($_GET['id'])) {
  //On la recupere
  $vehicle = getVehicleById($pdo, (int)$_GET['id']);
}

if ($vehicle) {
  if (deleteArticle($pdo, $_GET["id"])) {
      $messages[] = "L'article a bien été supprimer";
  } else {
      $errors[] = "Une erreur s'est produite lors de la suppression";
  }
} else {
  $errors[] = "Le véhicule n'existe pas";
}
?>

<div>
  <?php foreach ($messages as $message) { ?>
    <h1><?=$message?></h1>
</div>
<?php } ?>

<div>
  <?php foreach ($errors as $error) { ?>
    <h1><?=$error?></h1>
</div>
<?php } ?>