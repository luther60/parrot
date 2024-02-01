<?php
require_once __DIR__."/../admin/template_admin/header_admin.php";
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/pdo.php";
require_once __DIR__."/../lib/config.php";

$errors = [];
$messages = [];
$maxSize = 5000000;
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
//recuperer les infos de nos images
  
$img1_temp = $_FILES['Img1']['tmp_name'];//emplacement temporaire sur le serveur
$img1_name = $_FILES['Img1']['name'];//nom du fichier
$img1_type = $_FILES['Img1']['type'];//Type de fichier
$img1_size = $_FILES['Img1']['size'];//Taille du fichier
$img1_error = $_FILES['Img1']['error'];//valeur d'erreur

$img2_temp = $_FILES['Img2']['tmp_name'];
$img2_name = $_FILES['Img2']['name'];
$img2_type = $_FILES['Img2']['type'];
$img2_size = $_FILES['Img2']['size'];
$img2_error = $_FILES['Img2']['error'];

$img3_temp = $_FILES['Img3']['tmp_name'];
$img3_name = $_FILES['Img3']['name'];
$img3_type = $_FILES['Img3']['type'];
$img3_size = $_FILES['Img3']['size'];
$img3_error = $_FILES['Img3']['error'];


//Si l'image est bien recu
if (isset($_FILES["Img1"]["tmp_name"]) || ($_FILES["Img2"]["tmp_name"]) || ($_FILES["Img3"]["tmp_name"]))
{
   $check = getimagesize($_FILES['Img1']['tmp_name']);// On la controle
   $check2 = getimagesize($_FILES['Img2']['tmp_name']);
   $check3 = getimagesize($_FILES['Img3']['tmp_name']);
   
  if($img1_size > $maxSize || $img2_size > $maxSize || $img3_size > $maxSize  ){//Controle de la taille

    echo'Fichier trop gros';

  }else {

       if($check != false || $check2 != false|| $check3 != false) {

//Destruction d'éventuelles script
$file = htmlentities($img1_name, ENT_QUOTES, "UTF-8");
$file2 = htmlentities($img2_name, ENT_QUOTES, "UTF-8");
$file3 = htmlentities($img3_name, ENT_QUOTES, "UTF-8");

//Separation du nom et de l'extension qui retourne un array
$file = explode('.', $file);
$file2 = explode('.', $file2);
$file3 = explode('.', $file3);
   
//Mise en minuscule
$file = strtolower(end($file));
$file2 = strtolower(end($file2));
$file3 = strtolower(end($file3));
   
//Creation id unique
$file = uniqid().'.'.$file;
$file2 = uniqid().'.'.$file2;
$file3 = uniqid().'.'.$file3;

}else {
  echo 'Fichier non reconnu';
}
 //On s'assure qu'il n'y a pas d'erreur
if($check === false || $check2=== false || $check3 === false) {

  //Téléchargement du fichier
  echo "Echec de transfert";

}else {
   
  $destination = __DIR__."/../upload/".$file;
  $destination2 = __DIR__."/../upload/".$file2;
  $destination3 = __DIR__."/../upload/".$file3;
  
  move_uploaded_file($img1_temp, $destination);
  move_uploaded_file($img2_temp, $destination2);
  move_uploaded_file($img3_temp, $destination3);
 
  
  echo "Téléchargement réussi";
  echo($file); 
} 
 }
  }else{
    $error[] = 'Aucun fichier séléctionner';
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
    <img src="/../<?= htmlspecialchars($vehicle['Img1']);?>">
    <img src="/../<?= htmlspecialchars($vehicle['Img2']);?>">
    <img src="/../<?= htmlspecialchars($vehicle['Img3']);?>">
    </div>   
      
        
<!--Champs gestion/upload image -->
        
            <div class="upload">
            <label for="Img1">Choisir une image</label>
            
            <input type="file" name="Img1" id="image" value="<?= htmlspecialchars($vehicle['Img1']); ?>">
            
            <input type="file" name="Img2" id="image" value="<?= htmlspecialchars($vehicle['Img2']); ?>">

            <input type="file" name="Img3" id="image" value="<?= htmlspecialchars($vehicle['Img3']); ?>">
            </div>
        <?php } ?>
        
        <input class="submit" type="submit" name="saveVehicle"  value="Modifier">
        
    </form>

<?php require_once __DIR__."/../admin/template_admin/footer_admin.php";?>