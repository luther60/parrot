<?php
  require_once __DIR__."/templates/header.php";
  //Import class phpmailer
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  //Load composer autoloader
  require 'vendor/autoload.php';
  
  $errors = [];
  $messages = [];
  if(empty($_POST['send_message'])) {
    $errors[] = 'Veuillez remplir tous les champs avant d\'envoyer le formulaire de contact!';
  }
  //Vérification de la soumission du formulaire et de la méthode
  if(isset($_POST['send_message']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['requet'])){//On verifie la présence de données
      $errors[] = 'L\'objet de votre demande doit etre renseigné !';//Erreur si null
    }else {
      $requet = htmlspecialchars($_POST['requet'], ENT_QUOTES, 'UTF-8');//Sinon envoie à la fonction pour traitement
      if(!preg_match("/^[a-zA-Z-' ]*$/",$requet)) {
        $errors[] = 'Le titre ne peut contenir uniquement des lettres,tirets,apostrophes et espaces';
      }
    }

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
      $email = filter_var($_POST['mail']);
      if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Le format de l\'email n\'est pas valide';
      }
    }
    
    if (empty($_POST['story'])){
      $errors[] = 'Le message doit etre renseigné !';
    }else {
      $story = htmlspecialchars($_POST['story'], ENT_QUOTES, 'UTF-8');
      if(!preg_match("/^[a-zA-Zçéèà0-9 ,.'!?;-]+$/",$story)) {
        $errors[] = 'Le texte ne peut contenir uniquement des lettres,tirets,apostrophes et espaces';
      }
    }
    //Envoie des infos à sendMail()
    $validateMail = sendMail($requet,$name,$username,$phone,$email,$story);
    if($validateMail) {
      $errors[] = 'Le message n\a pas été envoyé';
    }else {
      $messages[] = 'Message envoyé !';
    }
 }
    
function sendMail($requet,$name,$username,$phone,$email,$story) {
  //Create instance (true => enables exceptions)
  $mail = new PHPMailer(true);
  
  try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'test@exemple.com';
    $mail->Password = 'a renseigner!!';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom($email,'gparrot');//Adresse expediteur
    $mail->addAddress('gregdev60@gmail.com', 'gregdev');//Adresse destinataire
    $mail->addReplyTo('gregorydge057@gmail.com');//Adresse de réponse du destinataire

    //Contents
    $mail->isHTML(true);
    $mail->Subject = $requet;//Sujet ou titre du mail
    $mail->Body = 'Message :'.$story.'Nom :'.$name.'  '.'Prénom :'.$username.' '.'Téléphone :'.$phone;//Corps de texte du mail
    $mail->send();
    
    
  }catch (Exception $e) {
    echo $e->getMessage();
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
      <label for="requet">Votre demande&nbsp;:<span aria-label="required">*</span></label>
      <input id="requet" type="text" name="requet"  />
    </div>
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
      <label for="story">Détaillez votre demande ici...</label>
      <textarea id="story" name="story" rows="10" cols="100"  >
      </textarea>
    </div>

    <div class="parent"><input class="create" type="submit" name="send_message" value="Envoyer"/></div>
    </fieldset>
  </form>

<?php
  require_once(__DIR__."/templates/footer.php");
?>
