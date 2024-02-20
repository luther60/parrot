<?php 
require_once __DIR__."/../super/header_super.php";
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/pdo.php";
require_once __DIR__."/../lib/config.php";
adminOnly();
$postAll = getPost($pdo);
?>


<h1>Liste des avis</h1>

  <main class="post_main">

   <?php foreach($postAll as $post) { ?>
  
  <div class="post">
    <h2>Nom : <?=htmlentities($post['name']); ?></h2>
    <p><?=htmlentities($post['avis']); ?></p>
    <p>Note : <?=htmlentities($post['note']); ?></p>

    <a class="inputPost" id="erase" href="post_delete_super.php?id=<?=$post['id'];?>">SUPPRIMER</a>
    
    <a class="inputPost" id="erase" href="sanitizePost_super.php?id=<?=$post['id'];?>">VALIDER L'AVIS</a>
  </div>
    
<?php } ?>
<div class="validateAvis">

</div>
</main>

<?php require_once __DIR__."/../admin/template_admin/footer_admin.php"; ?>