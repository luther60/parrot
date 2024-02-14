<?php
  require_once __DIR__."/lib/session.php";
  require_once __DIR__."/lib/pdo.php";
  require_once __DIR__."/lib/user.php";
  require_once __DIR__."/templates/header.php";
  $errors = [];
//On verifie que l'utilisateur à bien renseigner son email et password
  if(isset($_POST['loginUser'])) {
    $email = $_POST["email"];//On stocke les valeurs saisies par l'utilisateur
    $password = $_POST["password"];
//On appelle la fonction verifyUser ds le fichier user.php que l'on stocke ds $user
   $user = verifyUser($pdo,$email,$password);
  if ($user) {
    session_regenerate_id(true);//Fonction qui régenère l'id de session
    //On vérifie si l'utilisateur est admin ou user puis on le redirige en consequence
    $_SESSION["user"] = $user;
    if ($user['role'] === "user") {
      header("location: /index.php");
    }elseif ($user['role'] === "admin") {
      header("location: /admin/index_admin.php");
    }elseif ($user['role'] === "super"){
      header("location: /admin/index_admin.php");
    }
  }else {
    $errors[] = "Email ou mot de passe incorrect";
  }
  }
 

 
?>

<h1 class="log">Login</h1>

<?php foreach($errors as $error) {  ?>
    <div class="alert">
      <?=$error; ?>
    </div>
<?php } ?>

<form action="" method="post">
  <div class="champs">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
  </div>
  <div class="champs">
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password">
  </div>
  
  <input class="submit" type="submit" value="connexion" name="loginUser">
</form>

<?php
  require_once __DIR__."/templates/footer.php";
?>