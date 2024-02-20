<?php
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/config.php";
require_once __DIR__."/../lib/pdo.php";
require_once __DIR__."/../super/header_super.php";
adminOnly();
 ?>

<main><!--Gestion des droits suivant l'utilisateur -->
  

  <h1 class="session">Session super</h1>
 
<p >Bienvenue dans votre session super, d'ici vous pouvez gérer toute la partie backend de votre site telle que :</p>

    <h1><pre>L'ajout/suppression de véhicule via :</pre><span>Véhicules</span></h1>
  
    <h1><pre>La consultation et publication des avis postés via :</pre><span>Avis publiés</span></h1>

</main>

<?php require_once __DIR__."/../admin/template_admin/footer_admin.php";?>

