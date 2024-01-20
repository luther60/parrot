<?php
  require_once __DIR__."/templates/header.php";
  require_once __DIR__."/lib/pdo.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
 $sql = 'SELECT * FROM vehicle';
 $query = $pdo->prepare($sql);
 $query->execute();
 $vehicles = $query->fetchAll(PDO::FETCH_ASSOC);
 ?>

<h1>Nos véhicules d'occasion</h1>
<main class="main_occasion">
  
  <section>
    
<?php foreach($vehicles as $vehicle){ ?>
      <div class="display_card">
        <img class="img_card" src="<?php echo $vehicle['Img1'];?>">
        <div class="content_card">
          <h2><?php  echo $vehicle['Brand'].' '.$vehicle['Model'];?></h2>
          <p><?php echo $vehicle['Registration'].'|'.$vehicle['Kilometer'].'Km'.'|'.$vehicle['Fuel'];?></p>
          <p><?php echo $vehicle['Price'].'€' ?></p>
          <a  href="about.asp">Détails</a>
        </div>
      </div>
     
  </section>
  <?php }  ?>
</main>


<?php
  require_once(__DIR__."/templates/footer.php");
?>

</body>
</html>