 <?php
 
require_once __DIR__."/../lib/session.php";


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