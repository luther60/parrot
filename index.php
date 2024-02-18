<?php 
  require_once __DIR__."/lib/session.php";
  require_once __DIR__."/lib/pdo.php";
  require_once(__DIR__."/templates/header.php");
  require_once(__DIR__."/lib/config.php");
  $accueils = getAccueil($pdo);
  $postAll = getPostvalidate($pdo);
  //Encodage de la table avis en json
  $postJson = json_encode($postAll);
  $filterPost = file_put_contents('admin/JSON/post.json', $postJson);  
?>

<!-- Display main page -->
<main>
  <a class="inputPost" href="form_avis.php">Déposer un avis</a>
  <?php foreach($accueils as $accueil){ ?>
  <section class="main_index">
  <h1><?= $accueil["titre"] ?></h1>
  <article class="main_content">
    <img class="img_home" src="<?= $accueil["img"] ?>" alt="<?= $accueil["img"] ?>">
    <p><?= $accueil["text"] ?>
    </p>
  </article>
  </section>

<?php } ?>

<div class="validateAvis">
<!--Function js => getPost -->
</div>
</main>
<script src="displayAvis.js" type="module"></script>
<!-- Display footer -->
<?php
  require_once(__DIR__."/templates/footer.php");
?>
