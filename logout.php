<?php
 require_once __DIR__."/lib/session.php";

session_destroy();//Détruit la session
unset($_SESSION);//Permet de ne plus avoir en mémoire le tableau de session
header("location: /index.php");

