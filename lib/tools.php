<?php

//Fichier de test
 $default =  "upload/default_cars.jpg";

?>

<form action="/lib/tools.php" method="POST" enctype="multipart/form-data">
<div class="upload">
            <label for="img1">Choisir une image</label>
            <br>
            <br>
            <input type="file" name="img1" id="image" value="img1">
            <br>
            <input type="file" name="img2" id="image" value="img1">
            <br>
            <input type="file" name="img3" id="image" value="img1">
            <br>
            <input class="submit" type="submit" name="test"  value="envoyer">
            </div>
            </form>
           

        
<?php 
 
$errors = [];

$img1 = null;
$img2 = null;
$img3 = null;

if(isset($_POST['test'])){

  if ($_FILES['img1']['name'] === '') {
     echo 'upload/default_cars1.jpg';
    }else{
      $analyse = getimagesize($_FILES['img1']['tmp_name']);
      $file = htmlentities($_FILES['img1']['name'], ENT_QUOTES, "UTF-8");
      $file = explode('.', $file);
      $file = strtolower(end($file));
      $file = uniqid().'.'.$file;
      $destination = __DIR__."./upload/".$file;
      move_uploaded_file($_FILES['img1']['tmp_name'], $destination);
    }

    if ($_FILES['img2']['name'] === '') {
      echo 'upload/default_cars2.jpg';
      }else{
        $analyse2 = getimagesize($_FILES['img2']['tmp_name']);
        $file2 = htmlentities($_FILES['img2']['name'], ENT_QUOTES, "UTF-8");
        $file2 = explode('.', $file2);
        $file2 = strtolower(end($file2));
        $file2 = uniqid().'.'.$file2;
        $destination2 = __DIR__."./upload/".$file2;
        move_uploaded_file($_FILES['img2']['tmp_name'], $destination2);
      }

      if ($_FILES['img3']['name'] === '') {
        echo 'upload/default_cars3.jpg';
        }else{
             if(isset($vehicle['Img3'])) {
              echo'suppression';
             }else {
              $analyse3 = getimagesize($_FILES['img3']['tmp_name']);
              $file3 = htmlentities($_FILES['img3']['name'], ENT_QUOTES, "UTF-8");
              $file3 = explode('.', $file3);
              $file3 = strtolower(end($file3));
              $file3 = uniqid().'.'.$file3;
              $destination3 = __DIR__."./upload/".$file3;
              move_uploaded_file($_FILES['img3']['tmp_name'], $destination3);
             }
        
          
        }

 
}
//A tester
$test = $_FILES['img1']['tmp_name'];
function UploadImg() {
  
   getimagesize($_FILES['img1']['tmp_name']);
  $file3 = htmlentities($_FILES['img1']['name'], ENT_QUOTES, "UTF-8");
  $file3 = explode('.', $file3);
  $file3 = strtolower(end($file3));
  $file3 = uniqid().'.'.$file3;
  $destination3 = __DIR__."/../upload/".$file3;
  move_uploaded_file($_FILES['img1']['tmp_name'], $destination3);
};
UploadImg();