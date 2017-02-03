<?php
	include_once("code/sites/modele/inventaire.php");
	include_once("code/sites/modele/co_in.php");


function tags_html($tags){
	$html_tags = "";
	for($i=0;$i<count($tags);$i++){
		$html_tags = $html_tags." ".$tags[$i]["nom"];
	}
	return $html_tags;
}


if (isset($_SESSION["id_user"])) {
	$nom_entreprise = getEntrepriseById($_SESSION["id_user"])["nom"];
	if(isset($_POST["Modifier"])){
			change_groupe($_POST["id"], $_POST["groupe"]);
			update_tags($_POST["tags"],$_POST["rm_tags"],$_POST["id"]); // ATTENTION SI RM_tags pas défini

	}elseif (isset($_POST["add_groupe"])) {
        	exec("sudo mkdir projets/".$nom_epse."/inventaire/".$_POST["nom"]);
	        echo"LALALA"; 
	}

		$id_entreprise =($_SESSION["id_user"]);
		if(isset($_POST["recherche"])){
			$machines = recherche($id_entreprise,$_POST["champ"]);
		}else{
			$machines = getMachinesByEntreprise($id_entreprise);
		}
		
	include_once("code/sites/vue/inventaire.php");
} else {
	include('code/sites/controleur/connexion.php');
}
