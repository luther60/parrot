<?php
require_once __DIR__."/../admin/template_admin/header_admin.php";
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/pdo.php";
require_once __DIR__."/../lib/config.php";
$users = getUsers($pdo);
?>
<main>
 <h1 class="session">Session administrateur</h1>
<h1>Liste des superviseur</h1>

<div class="parent">
<a class="create" href="create_user.php">Ajouter un nouveau superviseur</a>
</div>
<table>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Email</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($users as $user) { ?>

    <tr>
      <td><?=htmlentities($user['id']);?></td>
      <td><?=htmlentities($user['FirstName']);?></td>
      <td><?=htmlentities($user['LastaName']);?></td>
      <td><?=htmlentities($user['Email']);?></td>
      <td ><a class="delete" href="vehicle_update.php?id=<?=$user['id'];?>">MODIFIER</a></td>
 <!--Mettre en place une confirmation avant delete final -->     
      <td ><a class="delete" id="erase" href="user_delete.php?id=<?=$user['id'];?>">SUPPRIMER</a></td>
    </tr>
<?php }; ?>  

  
</main>
  </tbody>
</table>

<?php require_once __DIR__."/../admin/template_admin/footer_admin.php";?>