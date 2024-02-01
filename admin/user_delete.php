<?php
require_once __DIR__."/../admin/template_admin/header_admin.php";
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/config.php";
require_once __DIR__."/../lib/pdo.php";

$user = false;
$errors = [];
$messages = [];

//On verifie si il a une requete id
if(isset($_GET['id'])) {
  //On la recupere
  $user = getUsersById($pdo, (int)$_GET['id']);
}

if ($user) {
  if (deleteUser($pdo, $_GET["id"])) {
      $messages[] = "Le superviseur à bien été supprimer";
  } else {
      $errors[] = "Une erreur s'est produite lors de la suppression";
  }
} else {
  $errors[] = "Le superviseur n'existe pas";
}
?>

<div>
  <h1>Suppression véhicule</h1>
  <?php foreach ($messages as $message) { ?>
    <h1><?=$message?></h1>
</div>
<?php } ?>

<div>
  <?php foreach ($errors as $error) { ?>
    <h1><?=$error?></h1>
</div>
<?php } ?>
<div class="parent">
<a class="create" href="index_admin.php">Retourner à l'accueil administration</a>
</div>

<div class="parent">
<a class="create" href="create_user.php">Ajouter un nouveau superviseur</a>
</div>