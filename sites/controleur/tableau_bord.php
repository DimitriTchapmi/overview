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
	if(isset($_POST["id"])){
			change_groupe($_POST["id"], $_POST["groupe"]);
			update_tags($_POST["tags"],$_POST["rm_tags"],$_POST["id"]); // ATTENTION SI RM_tags pas défini

	}
		$nom_entreprise =($_SESSION["id_user"]);
		$machines = getMachinesByEntreprise($nom_entreprise);
	include_once("vue/inventaire.php");
} else {
	include('controleur/connexion.php');
}