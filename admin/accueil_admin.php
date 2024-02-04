<?php 
  require_once __DIR__."/../lib/session.php";
  require_once __DIR__."/../lib/pdo.php";
  require_once(__DIR__."/../admin/template_admin/header_admin.php");
  require_once(__DIR__."/../lib/config.php");
  adminOnly();
  $accueils = getAccueil($pdo);
  
?>

<!-- Display main page -->
<main>
  <?php foreach($accueils as $accueil){ ?>
  <section>
  <h1><?= $accueil["titre"] ?></h1>
  <article class="main_content">
    <img class="img_home" src="/../<?= $accueil["img"] ?>" alt="<?= $accueil["img"] ?>">
    <p><?= $accueil["text"] ?>
    </p>
  </article>
  <a  href="accueil_admin_update.php?id=<?=$accueil["id"]?>">Modifier</a>
  </section>

<?php } ?>
</main>
<!-- Display footer -->
<?php
  require_once(__DIR__."/..//templates/footer.php");
?>
