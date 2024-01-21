<?php
  require_once __DIR__."/templates/header.php";
  require_once __DIR__."/lib/pdo.php";
  require_once __DIR__."/lib/config.php";
?>

<?php
$id = $_GET["id"];
$vehicle = getVehicleById($pdo, $id);
?>

<main>
 <section>
    <div>
  <img src="<?=htmlentities($vehicle['Img1']);?>" alt="Image Ford F150">
  <div>
    <h2>lblkbkbblb</h2>
    <p>kbmkjbmbivbjfcxfckcvlvm</p>
    <p>kbmkjbmbivbjfcxfckcvlvm</p>
  </div>
</div>
 </section>
</main>
<?php
  require_once(__DIR__."/templates/footer.php");
?>  
