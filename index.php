<?php 
  require_once __DIR__."/lib/session.php";
  require_once __DIR__."/lib/pdo.php";
  require_once(__DIR__."/templates/header.php");
  require_once(__DIR__."/lib/config.php");
  $accueils = getAccueil($pdo);
  
?>

<!-- Display main page -->
<main>
  <?php foreach($accueils as $accueil){ ?>
  <section>
  <h1><?= $accueil["titre"] ?></h1>
  <article class="main_content">
    <img class="img_home" src="<?= $accueil["img"] ?>" alt="<?= $accueil["img"] ?>">
    <p><?= $accueil["text"] ?>
    </p>
  </article>
  </section>

<?php } ?>
</main>
<!-- Display footer -->
<?php
  require_once(__DIR__."/templates/footer.php");
?>
