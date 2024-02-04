 <?php
require_once __DIR__."/../admin/template_admin/header_admin.php";
require_once __DIR__."/../lib/session.php";
adminOnly();
 ?>


<main>
  <div class="admin">
  <div class="button"><a class="create" href="accueil_admin.php">Modifier page d'accueil</a></div>
  <div class="button"><a class="create" href="create_user.php">Créer un superviseur</a></div>
  <div class="button"><a class="create" href="users.php">Liste des superviseur</a></div>
  </div>
  <h1 class="session">Session administrateur</h1>
 
<p >Bienvenue dans votre session administrateur, d'ici vous pouvez gérer toute la partie backend de votre site telle que :</p>

    <h1><pre >La création ou suppression de compte superviseur avec des droits plus restreint</pre>
     <pre>afin de vous assister dans vos taches quotidiennes via:</pre><span>Créer un superviseur</span></h1>

    <h1><pre>L'ajout/suppression de véhicule via :</pre><span>Véhicules</span></h1>
  
    <h1><pre>La consultation et publication des avis postés via :</pre><span>Avis publiés</span></h1>

    <h1><pre>La consultation des messages reçu via:</pre><span>Messages</span></h1>

    <h1><pre>La modification de vos horaires d'ouverture via :</pre><span>??????</span></h1>

</main>

<?php require_once __DIR__."/../admin/template_admin/footer_admin.php";?>




