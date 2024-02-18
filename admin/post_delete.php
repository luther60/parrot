<?php
require_once __DIR__."/../admin/template_admin/header_admin.php";
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/config.php";
require_once __DIR__."/../lib/pdo.php";

$post = false;
$errors = [];
$messages = [];

//On verifie si il a une requete id
if(isset($_GET['id'])) {
  //On la recupere
  $postByid = postByid($pdo, (int)$_GET['id']);
}

if ($postByid) {
  if (deletePost($pdo, $_GET["id"])) {
      $messages[] = "L'avis à bien été supprimer";
  } else {
      $errors[] = "Une erreur s'est produite lors de la suppression";
  }
} else {
  $errors[] = "L'avis n'existe pas";
}
?>
 <a class="homePost" id="home" href="post_clients.php?">Retourner aux avis</a>
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