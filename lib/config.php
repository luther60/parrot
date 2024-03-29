<?php

/*
Page 1:LIMIT 0, 10 (Offset=>point de départ, nb d'éléments par page)
Page 2:LIMIT 10, 10
Page 3:LIMIT 20,10

param : page et limit
offset = (page - 1) * limit
Ex: Page 3 
30 = (3 - 1) * 10
*/
/*Fonction qui recupere un article via son id => on passe en paramètre le PDO et l'id */
function getVehicleById(PDO $pdo, int $id):array
{
/*Requete récuperant l'id via une variable intermédiaire transmise ds le bindvalue*/  
$sql = 'SELECT * FROM vehicle WHERE id = :id';
$query = $pdo->prepare($sql);
$query->bindValue(":id", $id, PDO::PARAM_INT);//pdo PARAM_INT CAR ON ATTEND UN INTEGER
$query->execute();
$vehicle = $query->fetch(PDO::FETCH_ASSOC);//FETCH CAR ON SOUHAITE RECUPERER UN SEUL ELEMENT
return $vehicle;
};

define("LIMIT_PER_PAGE", 5);
//On recupere toutes la table vehicle
function getVehicles(PDO $pdo, int $limit = null, int $page = null):array {
 $sql = 'SELECT * FROM vehicle';
 
 if ($limit && !$page) {
  $sql .= " LIMIT :limit";
 }

 if ($page) {
  $sql .= " LIMIT :offset, :limit";
 }

$query = $pdo->prepare($sql);

 if ($limit) {
  $query->bindValue(":limit", $limit, PDO::PARAM_INT);
 }

 if ($page) {
  $offset = ($page - 1) * $limit;
  $query->bindValue(":offset", $offset, PDO::PARAM_INT);
 }

 $query->execute();
 $vehicles = $query->fetchAll(PDO::FETCH_ASSOC);

 return $vehicles;

}

//Fonction permettant la gestion d'image par defaut ou trouvée

/*Fonction qui renvoie le nb de véhicules ds la BDD via count */
function getTotalArticle(PDO $pdo):int
{
$sql = 'SELECT COUNT(*) as total FROM vehicle';
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);//FETCH CAR ON VA RECUPERER UNE SEULE LIGNE
return $result['total'];//Ici le total fait réference a l'alias ds la requete sql via as
};

//Fonction suppression vehicle
function deleteArticle(PDO $pdo, int $id):bool 
{
  $query = $pdo->prepare("DELETE FROM vehicle WHERE id = :id");
  $query->bindValue(':id', $id, $pdo::PARAM_INT);
  $query->execute();

    if ($query->rowCount() > 0) {//Retourne le nb de ligne
        return true;
    } else {
        return false;
    }
}


//Fonction ajout/creation d'un nouveau véhicule
function createVehicle(
  PDO $pdo,string $brand,string $model,int $price,string $immat,int $km,string $fuel,string $cv,string $speed,
  string $option
  ):bool 
{
  
    $query = $pdo->prepare("INSERT INTO vehicle (`Brand`,`Model`,`Price`,`Registration`,`Kilometer`,`Fuel`,`MaxSpeed`,`CV`,`Option`)"
          ."VALUES(:brand, :model, :price, :immat, :km, :fuel, :cv, :speed, :option)");
  
          $query->bindValue(':brand', $brand, $pdo::PARAM_STR);
          $query->bindValue(':model', $model, $pdo::PARAM_STR);
          $query->bindValue(':price', $price, $pdo::PARAM_INT);
          $query->bindValue(':immat', $immat, $pdo::PARAM_STR);
          $query->bindValue(':km', $km, $pdo::PARAM_INT);
          $query->bindValue(':fuel', $fuel, $pdo::PARAM_STR);
          $query->bindValue(':cv', $cv, $pdo::PARAM_STR);
          $query->bindValue(':speed', $speed, $pdo::PARAM_STR);
          $query->bindValue(':option', $option, $pdo::PARAM_STR);
          return $query->execute();
           
  }

  //Fonction modification d'un véhicule
  function saveVehicle(PDO $pdo,string $brand,$model,$price,$immat,$km,$img1,$img2,$img3,$fuel,$speed,$cv,$supp,$id):bool 
{
$query = $pdo->prepare("UPDATE `vehicle` SET `Brand` = :brand,`Model` = :model, `Price` = :price, `Registration` = :immat,
         `Kilometer` = :km, `Img1` = :img1, `Img2` = :img2,`Img3` = :img3, `Fuel` = :fuel, `MaxSpeed` = :speed, `CV` = :cv,
          `Option` = :supp WHERE `id` = :id ");
       
        
          $query->bindValue(':id', $id, $pdo::PARAM_INT);
          $query->bindValue(':brand', $brand, $pdo::PARAM_STR);
          $query->bindValue(':model', $model, $pdo::PARAM_STR);
          $query->bindValue(':price',$price, $pdo::PARAM_INT);
          $query->bindValue(':immat', $immat, $pdo::PARAM_STR);
          $query->bindValue(':km',$km, $pdo::PARAM_INT);
          $query->bindValue(':img1', $img1, $pdo::PARAM_STR);
          $query->bindValue(':img2', $img2, $pdo::PARAM_STR);
          $query->bindValue(':img3', $img3, $pdo::PARAM_STR);
          $query->bindValue(':fuel', $fuel, $pdo::PARAM_STR);
          $query->bindValue(':speed', $speed, $pdo::PARAM_STR);
          $query->bindValue(':cv', $cv, $pdo::PARAM_STR);
          $query->bindValue(':supp', $supp, $pdo::PARAM_STR);
          return $query->execute();  
};   


//Fonction création d'un nouveau user
function create_user(PDO $pdo,string $email,string $hash,string $name,string $last_name,$role):bool {
  $query = $pdo->prepare("INSERT INTO users (`Email`,`Password`,`FirstName`,`LastaName`,`role`)"
  ."VALUES (:email, :password, :name, :last_name, :role)");

  $query->bindValue(':email',$email,$pdo::PARAM_STR);
  $query->bindValue(':password',$hash,$pdo::PARAM_STR);
  $query->bindValue(':name',$name,$pdo::PARAM_STR);
  $query->bindValue(':last_name',$last_name,$pdo::PARAM_STR);
  $query->bindValue(':role',$role,$pdo::PARAM_STR);
  return $query->execute();

};

//Fonction suppression user
function deleteUser(PDO $pdo, int $id):bool 
{
  $query = $pdo->prepare("DELETE FROM users WHERE id = :id");
  $query->bindValue(':id', $id, $pdo::PARAM_INT);
  $query->execute();

    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

//Fonction all users
function getUsers(PDO $pdo):array {
  $query = $pdo->prepare("SELECT * FROM users");
  $query->execute();
  $users = $query->fetchAll(PDO::FETCH_ASSOC);
  return $users;
};

//Fonction user by id
function getUsersById(PDO $pdo, int $id):array
{
$sql = 'SELECT * FROM users WHERE id = :id';
$query = $pdo->prepare($sql);
$query->bindValue(":id", $id, PDO::PARAM_INT);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);
return $user;
};

//Fonction creation de module accueil
function createAccueil(PDO $pdo,string $titre, string $img, string $text):bool
{
  $query = $pdo->prepare("INSERT INTO `accueil` (`titre`,`img`,`text`) VALUES (:titre,:img,:text)");

  $query->bindValue(':titre', $titre, PDO::PARAM_STR);
  $query->bindValue(':img', $img, PDO::PARAM_STR);
  $query->bindValue(':text', $text, PDO::PARAM_STR);
  return $query->execute();
}

//Fonction accueil by id
function accueilById(PDO $pdo, int $id):array
{
  $query = $pdo->prepare("SELECT * FROM `accueil` WHERE id = :id");
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->execute();
  $accueil = $query->fetch(PDO::FETCH_ASSOC);
  return $accueil;
};

//Fonction full accueil
function getAccueil(PDO $pdo):array {
  
  $query = $pdo->prepare("SELECT * FROM `accueil`");
  $query->execute();
  $accueils= $query->fetchAll(PDO::FETCH_ASSOC);
  return $accueils;
 }

 //Fonction création d'un nouvel avis
function create_post(PDO $pdo,string $name,string $username,string $phone,string $mail,string $avis,string $note):bool {
  $query = $pdo->prepare("INSERT INTO postusers (`name`,`username`,`phone`,`mail`,`avis`,`note`)"
  ."VALUES (:name, :username, :phone, :mail, :avis, :note)");

  $query->bindValue(':name',$name,$pdo::PARAM_STR);
  $query->bindValue(':username',$username,$pdo::PARAM_STR);
  $query->bindValue(':phone',$phone,$pdo::PARAM_STR);
  $query->bindValue(':mail',$mail,$pdo::PARAM_STR);
  $query->bindValue(':avis',$avis,$pdo::PARAM_STR);
  $query->bindValue(':note',$note,$pdo::PARAM_STR);
  return $query->execute();

};

//Récuperation de tous les avis
function getPost(PDO $pdo):array {
  $query = $pdo->prepare("SELECT * FROM `postusers`");
  $query->execute();
  $postAll = $query->fetchAll(PDO::FETCH_ASSOC);
  return $postAll;
}

//Suppression des avis
function deletePost(PDO $pdo, int $id) 
{
  $query = $pdo->prepare("DELETE FROM postusers WHERE id = :id");
  $query->bindValue(':id', $id, $pdo::PARAM_INT);
  $query->execute();

  if ($query->rowCount() > 0) {
    return true;
} else {
    return false;
}
}

//Fonction accueil by id
function postByid(PDO $pdo, int $id):array
{
  $query = $pdo->prepare("SELECT * FROM `postusers` WHERE id = :id");
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->execute();
  $postByid = $query->fetch(PDO::FETCH_ASSOC);
  return $postByid;
};

//Fonction création d'un nouvel avis validé
function create_post_validate(PDO $pdo,string $name,string $username,string $phone,string $email,string $avis,string $note):bool {
  $query = $pdo->prepare("INSERT INTO postusersvalidate (`name`,`username`,`phone`,`mail`,`avis`,`note`)"
  ."VALUES (:name, :username, :phone, :mail, :avis, :note)");

  $query->bindValue(':name',$name,$pdo::PARAM_STR);
  $query->bindValue(':username',$username,$pdo::PARAM_STR);
  $query->bindValue(':phone',$phone,$pdo::PARAM_STR);
  $query->bindValue(':mail',$email,$pdo::PARAM_STR);
  $query->bindValue(':avis',$avis,$pdo::PARAM_STR);
  $query->bindValue(':note',$note,$pdo::PARAM_STR);
  return $query->execute();

};

//Récuperation de tous les avis validé
function getPostvalidate(PDO $pdo):array {
  $query = $pdo->prepare("SELECT * FROM `postusersvalidate`");
  $query->execute();
  $postAll = $query->fetchAll(PDO::FETCH_ASSOC);
  return $postAll;
}