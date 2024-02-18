<?php
require_once __DIR__."/../admin/template_admin/header_admin.php";
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/config.php";
require_once __DIR__."/../lib/pdo.php";

$vehicle = false;
$errors = [];
$messages = [];

//On verifie si il a une requete id
if(isset($_GET['id'])) {
  $postByid = postByid($pdo, $_GET['id']);
  
  $name = $postByid['name'];
  $username = $postByid['username'];
  $phone = $postByid['phone'];
  $email = $postByid['mail'];
  $avis = $postByid['avis'];
  $note = $postByid['note'];
  create_post_validate($pdo,$name,$username,$phone,$email,$avis,$note);
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