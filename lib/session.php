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