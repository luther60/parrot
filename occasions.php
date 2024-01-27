<?php
  require_once __DIR__."/templates/header.php";
  require_once __DIR__."/lib/pdo.php"; 
  require_once __DIR__."/lib/config.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php $vehicles = getVehicles($pdo);?>

<h1>Nos véhicules d'occasion</h1>
<main class="main_occasions">
 <?php foreach($vehicles as $vehicle){ ?>
  <section>   
    
      <div class="display_card">  
        
        <img class="img_card" src="<?=htmlentities($vehicle['Img1']);?>">
        <div class="content_card">
          <h2><?=htmlentities($vehicle['Brand']).' '.htmlentities($vehicle['Model']);?></h2>
          <p><?=htmlentities($vehicle['Registration']).'|'.htmlentities($vehicle['Kilometer']).'Km'.'|'.htmlentities($vehicle['Fuel']);?></p>
          <p><?=htmlentities($vehicle['Price']).'€ '?></p>
          <a  href="occasion.php?id=<?=$vehicle["id"]?>">Détails</a>
        </div>
      </div> 
  </section>
  <?php } ?>
</main>


<?php
  require_once(__DIR__."/templates/footer.php");
?>

</body>
</html>