<?php
require_once __DIR__."/../admin/template_admin/header_admin.php";
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/pdo.php";
require_once __DIR__."/../lib/config.php";

$errors = [];
$messages = [];
$file = null;
$file2 = null;
$file3 = null;

/*Gérer l'ajout d'une seule image possible et suppression d'eventuelle ancienne image*/

if (isset($_GET['id'])) {
    //requête pour récupérer les données du véhicule courant en cas de modification
    $vehicle = getVehicleById($pdo, $_GET['id']);
    if ($vehicle === false) {
        $errors[] = "L'article n\'existe pas";
    }
    $pageTitle = "Formulaire modification article";
};


//On verifie que le formulaire retourne bien une valeur
  if (isset($_POST['saveVehicle'])) {

  
if ($_FILES['Img1']['name'] === '') {
  
 }else{
   $analyse = getimagesize($_FILES['Img1']['tmp_name']);//Controle
   $file = htmlentities($_FILES['Img1']['name'], ENT_QUOTES, "UTF-8");//XSS
   $file = explode('.', $file);
   $file = strtolower(end($file));//Mise en minuscule de l'extension
   $file = uniqid().'.'.$file;//Attribution d'un nom unique
   $destination = __DIR__."/../upload/".$file;//Indication de l'emplacement du fichier
   move_uploaded_file($_FILES['Img1']['tmp_name'], $destination);//Deplacement du fichier temporaire vers emplacement definitif
 }

 if ($_FILES['Img2']['name'] === '') {
  
   }else{
     $analyse2 = getimagesize($_FILES['Img2']['tmp_name']);
     $file2 = htmlentities($_FILES['Img2']['name'], ENT_QUOTES, "UTF-8");
     $file2 = explode('.', $file2);
     $file2 = strtolower(end($file2));
     $file2 = uniqid().'.'.$file2;
     $destination2 = __DIR__."/../upload/".$file2;
     move_uploaded_file($_FILES['Img2']['tmp_name'], $destination2);
   }

   if ($_FILES['Img3']['name'] === '') {
    
     }else{
         $analyse3 = getimagesize($_FILES['Img3']['tmp_name']);
         $file3 = htmlentities($_FILES['Img3']['name'], ENT_QUOTES, "UTF-8");
         $file3 = explode('.', $file3);
         $file3 = strtolower(end($file3));
         $file3 = uniqid().'.'.$file3;
         $destination3 = __DIR__."/../upload/".$file3;
         move_uploaded_file($_FILES['Img3']['tmp_name'], $destination3);
          }
           
    $id = $_GET['id'];
    $brand = $_POST['marque'];
    $model = $_POST['modele'];
    $price = $_POST['prix'];
    $immat = $_POST['immat'];
    $km = $_POST['km'];
    $img1 = "upload/".$file;
    $img2 = "upload/".$file2;
    $img3 = "upload/".$file3;
    $fuel = $_POST['fuel'];
    $speed = $_POST['maxspeed'];
    $cv = $_POST['cv'];
    $supp = $_POST['option'];
    $res = saveVehicle($pdo,$brand,$model,$price,$immat,$km,$img1,$img2,$img3,$fuel,$speed,$cv,$supp,$id);
        }
  
   
   
    
  
  
  
    
    
  
   
   

 


?>
<h1><?= htmlspecialchars($pageTitle); ?></h1>

<?php foreach ($messages as $message) { ?>
    <div class="alert alert-success" role="alert">
        <?= htmlspecialchars($message); ?>
    </div>
<?php } ?>
<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger" role="alert">
        <?= htmlspecialchars($error); ?>
    </div>
<?php } ?>


<?php if ($vehicle !== false) { ?>
    <form method="POST" action="vehicle_update.php?id=<?=$_GET['id'];?>" enctype="multipart/form-data">
    <div class="form">
      <label for="marque">Marque&nbsp;:<span aria-label="required">*</span></label>
      <input id="marque" type="text" name="marque" required value="<?= htmlspecialchars($vehicle['Brand']); ?>"/>
    </div>

    <div class="form">
      <label for="modele">Modèle&nbsp;:<span aria-label="required">*</span></label>
      <input id="modele" type="text" name="modele" required value="<?= htmlspecialchars($vehicle['Model']); ?>"/>
    </div>

    <div class="form">
      <label for="prix">Prix&nbsp;:<span aria-label="required">*</span></label>
      <input id="prix" type="text" name="prix" required value="<?= htmlspecialchars($vehicle['Price']); ?>"/>
    </div>

    <div class="form">
      <label for="immat">Année d'immatriculation&nbsp;:<span aria-label="required">*</span></label>
      <input id="immat" type="text" name="immat" required value="<?= htmlspecialchars($vehicle['Registration']); ?>"/>
    </div>

    <div class="form">
      <label for="km">Kilométrage&nbsp;:<span aria-label="required">*</span></label>
      <input id="km" type="text" name="km" required value="<?= htmlspecialchars($vehicle['Kilometer']); ?>"/>
    </div>

    <div class="form">
      <label for="fuel">Motorisation (Essence, Diesel, etc...)&nbsp;:<span aria-label="required">*</span></label>
      <input id="fuel" type="text" name="fuel" required value="<?= htmlspecialchars($vehicle['Fuel']); ?>"/>
    </div>

    <div class="form">
      <label for="cv">Nombre de CV&nbsp;:<span aria-label="required">*</span></label>
      <input id="cv" type="text" name="cv" required value="<?= htmlspecialchars($vehicle['CV']); ?>"/>
    </div>

    <div class="form">
      <label for="maxspeed">Vitesse maxi&nbsp;:<span aria-label="required">*</span></label>
      <input id="maxspeed" type="text" name="maxspeed" required value="<?= htmlspecialchars($vehicle['MaxSpeed']); ?>"/>
    </div>

    <div class="form">
      <label for="option">Options...</label>
      <textarea id="option" name="option" rows="10" cols="100"  required ><?= htmlspecialchars($vehicle['Option']); ?>
      </textarea>
    </div>

    <div class="displayform">
    <img src="/../<?= ($vehicle['Img1']);?>">
    <img src="/../<?= ($vehicle['Img2']);?>">
    <img src="/../<?= ($vehicle['Img3']);?>">
    </div>   
      
        
<!--Champs gestion/upload image -->
        
            <div class="upload">
            <label for="Img1">Choisir une image</label>
            
            <input type="file" name="Img1" id="image" value="<?= ($vehicle['Img1']); ?>">
            
            <input type="file" name="Img2" id="image" value="<?= ($vehicle['Img2']); ?>">

            <input type="file" name="Img3" id="image" value="<?= ($vehicle['Img3']); ?>">
            </div>
        <?php } ?>
        
        <input class="submit" type="submit" name="saveVehicle"  value="Modifier">
        
    </form>

<?php require_once __DIR__."/../admin/template_admin/footer_admin.php";?>