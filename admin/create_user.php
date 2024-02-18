<?php
require_once __DIR__."/../admin/template_admin/header_admin.php";
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/pdo.php";
require_once __DIR__."/../lib/config.php";
adminOnly();
$mess = [];

if(isset($_POST['create_user'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $role = $_POST['role'];
  if($password){
   
    $hash = password_hash($password, PASSWORD_DEFAULT);
   
    $create_user = create_user($pdo,$email,$hash,$name,$last_name,$role);
   
  }else { 
    $mess[] = "Mot de passe obligatoire";
  }if($create_user) {
   $mess[] = "Nouveau superviseur crée";
}else {
  $mess[] = "Un probleme est survenue";
}
  }
  


 ?>

<body>

<div class="parent"><a class="create" href="users.php">Liste des superviseur</a></div>


  <h1>Création d'un nouveau superviseur</h1>

  <?php foreach($mess as $mess) { ?>
  <h1 id="alertrue"><?=htmlspecialchars($mess);?></h1>
  <?php } ?>

  <form action="create_user.php" method="post">
    <fieldset>

    <p>Les champs obligatoires sont suivis de <span aria-label="required">*</span>.</p>

    <div class="form">
      <label for="email">Email&nbsp;:<span aria-label="required">*</span></label>
      <input id="email" type="text" name="email" required />
    </div>
    <div class="form">
      <label for="password">Mot de passe&nbsp;:<span aria-label="required">*</span></label>
      <input  id="password" type="text" name="password" required />
    </div>
    <div class="form">
      <label for="first_name">Nom&nbsp;:<span aria-label="required">*</span></label>
      <input id="first_name" type="text" name="first_name" required />
    </div>
    <div class="form">
      <label for="last_name">Prénom&nbsp;:<span aria-label="required">*</span></label>
      <input id="last_name" type="text" name="last_name" required />
    </div>
    <div class="form">
      <label for="role">Role&nbsp;:<span aria-label="required">*</span></label>
      <input id="role" type="text" name="role" required placeholder="Par defaut : super"/>
    </div>
    
    <div class="parent"><input class="create" type="submit" value="Envoyer" name="create_user"/></div>
    </fieldset>
  </form>

<?php require_once __DIR__."/../admin/template_admin/footer_admin.php";?>