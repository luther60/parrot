<?php 

require_once __DIR__."/../admin/template_admin/header_admin.php";
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/pdo.php";
require_once __DIR__."/../lib/config.php";
$mess = [];
//On verifie et récupère les données du formulaire
if(isset($_POST['create_vehicle'])) {
  $brand = $_POST['marque'];
  $model = $_POST['modele'];
  $price = $_POST['prix'];
  $immat = $_POST['immat'];
  $km = $_POST['km'];
  $fuel = $_POST['fuel'];
  $cv = $_POST['cv'];
  $speed = $_POST['maxspeed'];
  $option = $_POST['option'];
  $result = createVehicle($pdo, $brand, $model, $price, $immat, $km, $fuel, $cv, $speed, $option);
  if($result){
    $mess[] = "Véhicule enregistré";
  }else {
    $mess[] = "Probléme lors de l'enregistrement";
  }
}

?>
<?php foreach($mess as $mess) { ?>
<h1 id="alertrue"><?=htmlspecialchars($mess);?></h1>
<?php } ?>
<h1>Création d'un nouveau véhicule</h1>


<form action="" method="post">
<div class="form">
      <label for="marque">Marque&nbsp;:<span aria-label="required">*</span></label>
      <input id="marque" type="text" name="marque" required />
    </div>

    <div class="form">
      <label for="modele">Modèle&nbsp;:<span aria-label="required">*</span></label>
      <input id="modele" type="text" name="modele" required />
    </div>

    <div class="form">
      <label for="prix">Prix&nbsp;:<span aria-label="required">*</span></label>
      <input id="prix" type="text" name="prix" required />
    </div>

    <div class="form">
      <label for="immat">Année d'immatriculation&nbsp;:<span aria-label="required">*</span></label>
      <input id="immat" type="text" name="immat" required />
    </div>

    <div class="form">
      <label for="km">Kilométrage&nbsp;:<span aria-label="required">*</span></label>
      <input id="km" type="text" name="km" required />
    </div>

    <div class="form">
      <label for="fuel">Motorisation (Essence, Diesel, etc...)&nbsp;:<span aria-label="required">*</span></label>
      <input id="fuel" type="text" name="fuel" required />
    </div>

    <div class="form">
      <label for="cv">Nombre de CV&nbsp;:<span aria-label="required">*</span></label>
      <input id="cv" type="text" name="cv" required />
    </div>

    <div class="form">
      <label for="maxspeed">Vitesse maxi&nbsp;:<span aria-label="required">*</span></label>
      <input id="maxspeed" type="text" name="maxspeed" required />
    </div>

    <div class="form">
      <label for="option">Options...</label>
      <textarea id="option" name="option" rows="10" cols="100"  required>
      </textarea>
    </div>

    <div class="parent"><input class="submit" type="submit" value="Créer" name="create_vehicle"/></div>
</form>






<?php require_once __DIR__."/../admin/template_admin/footer_admin.php";?>