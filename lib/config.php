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

define("LIMIT_PER_PAGE", 10);
//On recupere toutes la table vehicle
function getVehicles(PDO $pdo, int $limit = null, int $page = null):array {
 $sql = 'SELECT * FROM vehicle';
 /*$limit = 3;*/
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



