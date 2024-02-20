<?php
require_once __DIR__."/../super/header_super.php";
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/pdo.php";
require_once __DIR__."/../lib/config.php";
adminOnly();
/*Si il y a une page existante*/
if (isset($_GET["page"])) {
  /*Alors on recupere la page via get*/ 
  $page = (int) $_GET["page"];
}else {//Sinon on redirige vers page 1
  $page = 1;
}

$vehicles = getVehicles($pdo, LIMIT_PER_PAGE, $page);
$totalVehicle = getTotalArticle($pdo);
$totalPage = ceil($totalVehicle / LIMIT_PER_PAGE);//Ceil permet d'arrondir à l'entier supérieur
 ?>

 <main>
 <h1 class="session">Session super</h1>
<h1>Liste des véhicules</h1>
<?php if ($totalPage > 1) { ?><!--On régule la pagination en fonction du nb de pages -->
<nav class="pagination">
  <ul class="pagination"><!--Pagination -->
    <?php for($i = 1;$i <= $totalPage ; $i++) { ?>
     <li class="page"><a  href="?page=<?=$i;?>"><?=$i;?></a></li>
    <?php } ?>
</ul>
</nav>
<?php } ?>
<div class="parent">
<a class="create" href="vehicles_create_super.php">Ajouter un nouveau vehicule</a>
</div>
<table>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">MARQUE</th>
      <th scope="col">MODELE</th>
      <th scope="col">PRIX</th>
      <th scope="col">ANNEE</th>
      <th scope="col">MODIFIER</th>
      <th scope="col">SUPPRIMER</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($vehicles as $vehicle) { ?>

    <tr>
      <td><?=htmlentities($vehicle['id']);?></td>
      <td><?=htmlentities($vehicle['Brand']);?></td>
      <td><?=htmlentities($vehicle['Model']);?></td>
      <td><?=htmlentities($vehicle['Price']);?></td>
      <td><?=htmlentities($vehicle['Registration']);?></td>
      <td ><a class="delete" href="vehicles_update_super.php?id=<?=$vehicle['id'];?>">MODIFIER</a></td>
 <!--Mettre en place une confirmation avant delete final -->     
      <td ><a class="delete" id="erase" href="vehicles_delete_super.php?id=<?=$vehicle['id'];?>">SUPPRIMER</a></td>
    </tr>
<?php }; ?>  
</main>
  </tbody>
</table>

<?php require_once __DIR__."/../admin/template_admin/footer_admin.php";?>