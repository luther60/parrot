<?php

function verifyUser(PDO $pdo,string $email,string $password):array|bool {
 
  $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");//On envoie la requete
  $query->bindvalue(":email", $email, PDO::PARAM_STR);
  $query->execute();
  $user = $query->fetch(PDO::FETCH_ASSOC);

  if($user && password_verify($password, $user["Password"])) {
   
    return $user;

  }else {
   
    return false;
  }
}