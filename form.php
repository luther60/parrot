<?php
  require_once __DIR__."/templates/header.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nous contacter</title>
</head>
<body>
  <form>
    <fieldset>

    <p>Les champs obligatoires sont suivis de <span aria-label="required">*</span>.</p>

    <div class="form">
      <label for="requet">Votre demande&nbsp;:<span aria-label="required">*</span></label>
      <input id="username" type="text" name="requet" required />
    </div>
    <div class="form">
      <label for="username">Nom&nbsp;:<span aria-label="required">*</span></label>
      <input  id="username" type="text" name="username" required />
    </div>
    <div class="form">
      <label for="username">Prénom&nbsp;:<span aria-label="required">*</span></label>
      <input id="username" type="text" name="username" required />
    </div>
    <div class="form">
      <label for="username">Téléphone&nbsp;:<span aria-label="required">*</span></label>
      <input id="username" type="text" name="username" required />
    </div>
    <div class="form">
      <label for="username">Email&nbsp;:<span aria-label="required">*</span></label>
      <input id="username" type="text" name="username" required />
    </div>
    <div class="form">
      <label for="story">Détaillez votre demande ici...</label>
      <textarea id="story" name="story" rows="10" cols="100"  required>
      </textarea>
    </div>
    </fieldset>
  </form>

<?php
  require_once(__DIR__."/templates/footer.php");
?>
</body>
</html>