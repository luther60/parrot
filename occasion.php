<?php
  require_once __DIR__."/templates/header.php";
  require_once __DIR__."/lib/pdo.php";
  require_once __DIR__."/lib/config.php";
  
?>

<?php
$error = false;

//On verifie que l'id est bien présent dans l'url
if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $vehicle = getVehicleById($pdo, $id);       
    //On verifie que l'on à bien récupérer un éléments existant ds la table, sinon on passe error à true
    if (!$vehicle) {
      $error = true;
    }
}else {
  $error = true;
}

?>

<main>
 <section>
<?php if (!$error) { ?>
 <div class="display_card">
      <div class = "full_img">
        <img class="img_card" src="<?=htmlentities($vehicle['Img1']);?>">
        <img class="img_card" src="<?=htmlentities($vehicle['Img2']);?>">
        <img class="img_card" src="<?=htmlentities($vehicle['Img3']);?>">
        </div>  
      <div class="content_card">
          <h2><?=htmlentities($vehicle['Brand']).' '.htmlentities($vehicle['Model']);?></h2>
          <p><?=htmlentities($vehicle['Registration']).'|'.htmlentities($vehicle['Kilometer']).'Km'.'|'.htmlentities($vehicle['Fuel']);?></p>
          <p><?=htmlentities($vehicle['Price']).'€ '?></p>
        </div>
      </div> 
      <div class="vehicle_features">
        <p>Max Speed : <?=htmlentities($vehicle['MaxSpeed']);?></p>
        <p>CV : <?=htmlentities($vehicle['CV']);?></p>
        <p>Options : <?=htmlentities($vehicle['Option']);?></p>
      </div>
<?php } else { ?>
  <h1>Oups, ce véhicule n'exixte plus!!!</h1>     
<?php } ?>    
 </section>
</main>
<?php
  require_once(__DIR__."/templates/footer.php");
?>  
