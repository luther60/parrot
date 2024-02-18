<?php 
require_once __DIR__."/templates/header.php";
require_once __DIR__."/lib/pdo.php";
require_once __DIR__."/lib/config.php";
  $errors = [];
  $messages = [];
  if(empty($_POST['send_avis'])) {
    $errors[] = 'Veuillez remplir tous les champs avant d\'envoyer votre avis !';
  }
  //Vérification de la soumission du formulaire et de la méthode
  if(isset($_POST['send_avis']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['name'])){
      $errors[] = 'Le nom doit etre renseigné !';
    }else {
      $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
      if(!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $errors[] = 'Le nom ne peut contenir uniquement des lettres,tirets,apostrophes et espaces';
      }
    }
    
    if (empty($_POST['username'])){
      $errors[] = 'Le prénom doit etre renseigné !';
    }else {
      $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
      if(!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
        $errors[] = 'Le prénom ne peut contenir uniquement des lettres,tirets,apostrophes et espaces';
      }
    }
    
    if (empty($_POST['phone'])){
      $errors[] = 'Le téléphone doit etre renseigné !';
    }else {
        $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
      if(!preg_match("#^[0-9]{10}$#",$phone)) {
        $errors[] = 'Numero non valide';
      }  
    }
      
    if (empty($_POST['mail'])){
      $errors[] = 'Le mail doit etre renseigné !';
    }else {
      $mail = filter_var($_POST['mail']);
      if(!filter_var($mail,FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Le format de l\'email n\'est pas valide';
      }
    }
    
    if (empty($_POST['story'])){
      $errors[] = 'La rédaction d\'un avis est obligatoire !';
    }else {
      $avis = htmlspecialchars($_POST['story'], ENT_COMPAT, 'UTF-8');
      if(!preg_match("/^[a-zA-Z-'é(-èçà),;.:!?% ]*$/",$avis)) {
        $errors[] = 'Le texte ne peut contenir uniquement des lettres,tirets,apostrophes et espaces';
      }
    }

    if (empty($_POST['note'])){
      $errors[] = 'La note doit etre renseigné !';
    }else {
        $note = htmlspecialchars($_POST['note'], ENT_QUOTES, 'UTF-8');
      if(!preg_match("#^[0-5]{1}$#",$note)) {
        $errors[] = 'Note non valide';
      }  
    }
    //Envoie de l'avis à la BDD()
    $validatePost = create_post($pdo,$name,$username,$phone,$mail,$avis,$note);
    if($validatePost) {
      $messages[] = 'Votre avis à bien été envoyé, il sera traité d\'ici peu !';
    }else {
      $errors[] = 'L\'avis n\a pas été envoyé';
    }
 }
?>

<body>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger" role="alert">
        <?= htmlspecialchars($error); ?>
    </div>
<?php } ?>
<?php foreach($messages as $message) { ?>
<h1 id="alertrue"><?=htmlspecialchars($message);?></h1>
<?php } ?>
  <!--Redirection sur la page en cours et prévention attaque xss -->
  <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <fieldset>

    <p>Les champs obligatoires sont suivis de <span aria-label="required">*</span>.</p>

    <div class="form">
      <label for="username">Nom&nbsp;:<span aria-label="required">*</span></label>
      <input  id="name" type="text" name="name"  />
    </div>
    <div class="form">
      <label for="username">Prénom&nbsp;:<span aria-label="required">*</span></label>
      <input id="username" type="text" name="username"  />
    </div>
    <div class="form">
      <label for="username">Téléphone&nbsp;:<span aria-label="required">*</span></label>
      <input id="phone" type="text" name="phone"  />
    </div>
    <div class="form">
      <label for="username">Email&nbsp;:<span aria-label="required">*</span></label>
      <input id="mail" type="text" name="mail"  />
    </div>
    <div class="form">
      <label for="story">Rédiger votre avis ici...</label>
      <textarea id="story" name="story" rows="10" cols="100"  >
      </textarea>
    </div>
    <div class="form">
      <label for="note">Note&nbsp;:<span aria-label="required">*</span></label>
      <input id="note" type="text" name="note" placeholder="Ici donner une note sur 5"  />
    </div>

    <div class="parent"><input class="create" type="submit" name="send_avis" value="Envoyer"/></div>
    </fieldset>
  </form>

<?php require_once(__DIR__."/templates/footer.php"); ?>