<?php
  require_once __DIR__."/templates/header.php";
  require_once __DIR__."/lib/pdo.php"; 
  require_once __DIR__."/lib/config.php";
?>

<?php $vehicles = getVehicles($pdo);
//Encodage de la table vehicles en json
$vehiclesFilter = json_encode($vehicles);
$filter = file_put_contents('admin/JSON/filter.json', $vehiclesFilter);
?>

<h1>Nos véhicules d'occasion</h1>

<p>Filtrer par:</p>
<div class="input_range">
  <div class="range">
    <label for="volume">Kilometrage</label>
    <input type="range" id="max_km" name="max_km" min="0" max="300000" step="5000"/>
  </div>

  <div class="range">
    <label for="volume">Prix</label>
    <input type="range" id="max_price" name="max_price" min="2000" max="150000" step="2000"/>
  </div>

  <div class="range">
    <label for="volume">Années</label>
    <input type="range" id="max_années" name="max_années" min="1" max="15" step="1"/>
  </div> 
</div>

<main class="main_occasions">
 
  <section class="vehicles">     
 
  </section>
 
</main>

<script src="test.js" type="module"></script>
<?php
  require_once(__DIR__."/templates/footer.php");
?>

</body>
</html>