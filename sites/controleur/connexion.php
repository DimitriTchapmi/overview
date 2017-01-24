<?php
// =>  Contrôleur
include("modele/co_in.php");
include("modele/connexion_bdd.php");
$message = "";
if(!isset($_SESSION["id_user"])){
	if(isset($_POST["action"])){
				$id_user = connexion($_POST["nom"],$_POST["pass"]);
				if($id_user == 0){
					$message = "Erreur : Login ou Mot de passe incorrect";
					include("vue/connexion.php"); // Ajouter un message sur la page
				}elseif($id_user != 0) {
					$_SESSION["id_user"] = $id_user;
					$_SESSION["login_user"] = $_POST["nom"];
					$_SESSION["pass_user"] = $_POST["pass"];
					include("controleur/tableau_bord.php");
				}
	} else{
		include_once("vue/connexion.php");
	
	}
}else
	include_once("controleur/tableau_bord.php");
	
?>