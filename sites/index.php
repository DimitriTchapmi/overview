<?php
session_start();
include("modele/connexion_bdd.php");
if($_SERVER["REQUEST_URI"] == "/"){
        include_once("vue/accueil.php");
}elseif($_SERVER["REQUEST_URI"] == "/inscription"){
        include_once("controleur/inscription.php");
}elseif($_SERVER["REQUEST_URI"] == "/connexion"){
        include_once("controleur/connexion.php");
}elseif($_SERVER["REQUEST_URI"] == "/gestion"){
        include_once("controleur/gestion.php");
}elseif($_SERVER["REQUEST_URI"] == "/inventaire"){
        include_once("controleur/tableau_bord.php");
}elseif(preg_match("/^\/overview\/machine/",$_SERVER["REQUEST_URI"])){
        //include_once("controleur/tableau_bord.php");
}elseif($_SERVER["REQUEST_URI"] == "/gestion_test"){
        include_once("controleur/gestion_test.php");
}

?>