 <?php
 
require_once __DIR__."/../lib/session.php";
/*Si pas de session existante ou pas le bon role (regenerate_id evite de réutiliser la page admin en cours de session sur autre
 navigateur que l'actuel, il est possible de limiter le temps de session via le cookie)*/
if(!isset($_SESSION['user'])) {
   header("location: /../../index.php");//redirection
};
if(isset($_SESSION['user']['role']) != 'admin') {
  header("location: /login.php");//redirection
};
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/style.css">
  <title>Garage Parrot</title>
</head>


<body>
  <header>
<nav>
   <img class="logo" src="/assets/images/logo2021.jpg" alt="Logo garage">
  <ul class="navbar">
    <li><a href="/index.php">hello</a></li>
    <li><a href="news.asp">Nos services</a></li>
    <li><a href="form.php">Nous contacter</a></li>
    <li><a href="/occasions.php">Nos occasions</a></li>
    <li><a href="/login.php">Admin</a></li>
    <!--Deconnexion -->
   <a class="power" href="/../index.php"><img class="power" src="/assets/images/power-off-solid.svg"/></a>
    
  </ul>
</nav> 
</header>
<?php
var_dump($_SESSION)
?>
<main>
  
</main>






<footer>

  <article class="footer_content">
    <h2>Coordonnées</h2>
    <pre>
      <p>29 rue de la chancellerie</p>
      <p>60892 Bataille la ville</p>
    </pre>
  </article>

  <a class="button" href="form.php">Contactez-nous</a>

  <article class="footer_content">
    <h2>Horaires d'ouverture</h2>
    <pre>
      <p></p>
      <p></p>
    </pre>
  </article>

</footer>

</body>
</html>