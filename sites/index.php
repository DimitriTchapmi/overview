<?php
session_start();
include("code/sites/modele/connexion_bdd.php");
if($_SERVER["REQUEST_URI"] == "/"){
        include_once("code/sites/vue/accueil.php");
}elseif($_SERVER["REQUEST_URI"] == "/inscription"){
        include_once("code/sites/controleur/inscription.php");
}elseif($_SERVER["REQUEST_URI"] == "/connexion"){
        include_once("code/sites/controleur/connexion.php");
}elseif($_SERVER["REQUEST_URI"] == "/gestion"){
        include_once("code/sites/controleur/gestion.php");
}elseif($_SERVER["REQUEST_URI"] == "/inventaire"){
        include_once("code/sites/controleur/tableau_bord.php");
}elseif(preg_match("/^\/machine/",$_SERVER["REQUEST_URI"])){
        include_once("code/sites/controleur/machine.php");
}elseif($_SERVER["REQUEST_URI"] == "/gestion_test"){
        include_once("controleur/gestion_test.php");
}elseif($_SERVER["REQUEST_URI"] == "/deconnexion"){
        include_once("controleur/deconnexion.php");
}

?>