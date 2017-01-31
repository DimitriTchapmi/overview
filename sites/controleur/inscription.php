<?php
// => Contrôleur
include("code/sites/modele/co_in.php");

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
					$commande = "sudo scripts/init_arbre_epse.sh ".$_POST["nom"] ;
					exec($commande);
					include("code/sites/vue/inventaire.php");
				}else{
					
					$message = $retour;
					include("code/sites/vue/inscription.php"); // Ajouter le message de $retour
				}
			}else{
				$message = "Les deux mots de passe ne sont pas identiques";
				include("code/sites/vue/inscription.html"); // Ajouter un message
			}
		}else{
			$message = "Le mot de passe doit faire entre 4 et 8 caractères";
			include("code/sites/vue/inscription.php"); // Ajouter un message
		}
	}else{
		include("code/sites/vue/inscription.php");
	}
}else
	include("code/sites/vue/accueil.html");