<?php
//En principe cette partie est gérée par l'hébergeur (A vérifier)
session_set_cookie_params([
    'lifetime' => 3600, //Temps de la session
    'path' => '/',
    'domain' => 'gparrot',
    /*'secure' => true,*/ //Ne fonctionne pas en local
    'httponly' => true //Les cookies en http sont insensible à js
]);

session_start();

function adminOnly() {
    //Si pas de session existante ou pas le bon role (regenerate_id evite de réutiliser la page admin en cours de session sur autre
// navigateur que l'actuel, il est possible de limiter le temps de session via le cookie)
if(!isset($_SESSION['user'])) {
    header("location: /../../index.php");//redirection
 };
}


