<?php
// => Contrôleur
include("modele/co_in.php");
include("modele/connexion_bdd.php");
$message = "";
if(!isset($_SESSION["id_user"])){
	if(isset($_POST["action"])){
		if(strlen($_POST["pass2"])> 3 AND strlen($_POST["pass2"])<9){
			if($_POST["pass1"] == $_POST["pass2"]){
				$retour = inscription($_POST["nom"],$_POST["pass1"],$_POST["mail"]);
				if (is_numeric($retour)){
					$_SESSION["id_user"] = $retour;
					$_SESSION["login_user"] = $_POST["nom"];
					$_SESSION["pass_user"] = $_POST["pass1"];
					//$commande = " sudo ./script_mail.sh 1 ".$_POST["login"]." ".$_SESSION["pass_user"]; COMMANDE SCRIPT ARBORESCENCE
					//exec($commande_chat);
					include("vue/tableau_bord.php");
				}else{
					
					$message = $retour;
					include("vue/inscription.php"); // Ajouter le message de $retour
				}
			}else{
				$message = "Les deux mots de passe ne sont pas identiques";
				include("vue/inscription.html"); // Ajouter un message
			}
		}else{
			$message = "Le mot de passe doit faire entre 4 et 8 caractères";
			include("vue/inscription.php"); // Ajouter un message
		}
	}else{
		include("vue/inscription.php");
	}
}else
	include("vue/accueil.html");