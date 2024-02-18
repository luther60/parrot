<?php
 require_once __DIR__."/../admin/template_admin/header_admin.php";
 require_once __DIR__."/../lib/session.php";
 require_once __DIR__."/../lib/pdo.php"; 
 require_once __DIR__."/../lib/config.php";
?>


<?php $vehicles = getVehicles($pdo);?>
<h1 class="session">Session administrateur</h1>
<h1>Nos véhicules d'occasion</h1>
<main class="main_occasions_admin">
 <?php foreach($vehicles as $vehicle){ ?>
  <section class="vehicles_admin">   
    
      <div class="display_card">  
      
        <img class="img_card" src="/../<?=htmlentities($vehicle['Img1']);?>">
        <div class="content_card">
          <h2><?=htmlentities($vehicle['Brand']).' '.htmlentities($vehicle['Model']);?></h2>
          <p><?=htmlentities($vehicle['Registration']).'|'.htmlentities($vehicle['Kilometer']).'Km'.'|'.htmlentities($vehicle['Fuel']);?></p>
          <p><?=htmlentities($vehicle['Price']).'€ '?></p>
          <a  href="occasion_admin.php?id=<?=$vehicle["id"]?>">Détails</a>
        </div>
      </div> 
  </section>
  <?php } ?>
</main>

<?php require_once __DIR__."/../admin/template_admin/footer_admin.php";?>


