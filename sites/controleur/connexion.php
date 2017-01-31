<?php
// =>  Contrôleur
include("code/sites/modele/co_in.php");
include("code/sites/modele/connexion_bdd.php");
$message = "";
if(!isset($_SESSION["id_user"])){
	if(isset($_POST["action"])){
				$id_user = connexion($_POST["nom"],$_POST["pass"]);
				if($id_user == 0){
					$message = "Erreur : Login ou Mot de passe incorrect";
					include("code/sites/vue/connexion.php"); // Ajouter un message sur la page
				}elseif($id_user != 0) {
					$_SESSION["id_user"] = $id_user;
					$_SESSION["login_user"] = $_POST["nom"];
					$_SESSION["pass_user"] = $_POST["pass"];
					include("code/sitescontroleur/tableau_bord.php");
				}
	} else{
		include_once("code/sites/vue/connexion.php");
	
	}
}else
	include_once("code/sites/controleur/tableau_bord.php");
	
?>