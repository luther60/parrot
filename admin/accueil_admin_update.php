<?php 
  require_once __DIR__."/../lib/session.php";
  require_once __DIR__."/../lib/pdo.php";
  require_once(__DIR__."/../admin/template_admin/header_admin.php");
  require_once __DIR__."/../lib/config.php";
  adminOnly();
 $errors = [];
 $messages = [];
  if (isset($_GET['id'])) {
    //requête pour récupérer les données de l'article courant en cas de modification
    $accueil = accueilById($pdo, $_GET['id']);
    if ($accueil === false) {
        $errors[] = "L'article n\'existe pas";
    }
    $pageTitle = "Formulaire modification module accueil";
};

  if(isset($_POST['create_accueil'])) {

    if ($_FILES['img']['name'] === '') {
  
    }else{
      $analyse = getimagesize($_FILES['img']['tmp_name']);//Controle
      $file = htmlentities($_FILES['img']['name'], ENT_QUOTES, "UTF-8");//XSS
      $file = explode('.', $file);
      $file = strtolower(end($file));//Mise en minuscule de l'extension
      $file = uniqid().'.'.$file;//Attribution d'un nom unique
      $destination = __DIR__."/../upload/".$file;//Indication de l'emplacement du fichier
      move_uploaded_file($_FILES['img']['tmp_name'], $destination);//Deplacement du fichier temporaire vers emplacement definitif
    }

    $titre = $_POST['titre'];
    $img = "upload/".$file;
    $text = $_POST['story'];
    $create = createAccueil($pdo,$titre,$img,$text);
    $messages[] = 'Modification effectué';
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
<?php if ($accueil !== false) { ?>
<form method="POST" action="accueil_admin_update.php?id=<?=$_GET['id'];?>" enctype="multipart/form-data">
    <fieldset>
    <p>Les champs obligatoires sont suivis de <span aria-label="required">*</span>.</p>
    <div class="form">
      <label for="titre">Titre&nbsp;:<span aria-label="required">*</span></label>
      <input id="titre" type="text" name="titre" required value="<?= htmlspecialchars($accueil['titre']); ?>"/>
    </div>
    <img  src="/../<?=$accueil['img']?>" alt="<?=$accueil['img']?>">
    <div class="form">
      <label for="img">Choisir une image&nbsp;:<span aria-label="required">*</span></label>
      <input  id="img" type="file" name="img" required value="<?= htmlspecialchars($accueil['img']); ?>"/>
    </div>
    <div class="form">
      <label for="story">Détaillez votre présentation ici...</label>
      <textarea id="story" name="story" rows="10" cols="100"  required><?= htmlspecialchars($accueil['text']); ?>"</textarea>  
    </div>
    <div class="parent"><input class="create" type="submit" name="create_accueil" /></div>
    </fieldset>
  </form>
  <?php } ?> 
<!-- Display footer -->
<?php
  require_once(__DIR__."/../templates/footer.php");
?>