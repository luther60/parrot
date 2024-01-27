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
function getVehicleById(PDO $pdo, int $id):array|bool
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

//Fonction delete vehicle
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