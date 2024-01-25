<?php
require_once __DIR__."/../admin/template_admin/header_admin.php";
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


 ?>
<h1>Liste des véhicules</h1>

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
      <td class="crud">MODIFIER</td>
      <td class="crud">SUPPRIMER</td>
    </tr>
<?php }; ?>    
  </tbody>
</table>

<?php require_once __DIR__."/../admin/template_admin/footer_admin.php";?>
