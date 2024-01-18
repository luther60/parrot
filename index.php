<?php require_once(__DIR__."/templates/header.php");
      require_once(__DIR__."/lib/main_index.php");
   
?>

<!-- Display main page -->
<main>
  <?php foreach($mainPage as $key => $mainContent){ ?>
  <section>
  <h1><?= $mainPage[$key]["title"] ?></h1>
  <article class="main_content">
    <img class="img_home" src="<?= $mainPage[$key]["image"] ?>" alt="<?= $mainPage[$key]["alt"] ?>">
    <p><?= $mainPage[$key]["textContent"] ?>
    </p>
  </article>
  </section>

<?php } ?>
</main>
<!-- Display footer -->
<?php
  require_once(__DIR__."/templates/footer.php");
?>
