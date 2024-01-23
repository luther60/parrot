<?php

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

//On recupere toutes la table vehicle
function getVehicles(PDO $pdo) {
 $sql = 'SELECT * FROM vehicle';
 $query = $pdo->prepare($sql);
 $query->execute();
 $vehicles = $query->fetchAll(PDO::FETCH_ASSOC);
 return $vehicles;
}

//Fonction permettant la gestion d'image par defaut ou trouvée



