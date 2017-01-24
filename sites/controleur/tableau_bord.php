<?php
	include_once("modele/inventaire.php");
	include_once("modele/co_in.php");
	include("modele/connexion_bdd.php");



function tags_html($tags){
	$html_tags = "";
	for($i=0;$i<count($tags);$i++){
		$html_tags = $html_tags." ".$tags[$i]["nom"];
	}
	return $html_tags;
}


if (isset($_SESSION["id_user"])) {
	if(isset($_POST["id"])){
		for($i=0;$i<count($_POST["id"]);$i++) {
			change_groupe($_POST["id"][$i], $_POST["groupe"][$i]);
			//ajouter fonction pour changement de groupe sur le serveur
		}
	}
		$nom_entreprise =($_SESSION["id_user"]);
		$machines = getMachinesByEntreprise($nom_entreprise);
	include_once("vue/inventaire.php");
} else {
	include('controleur/connexion.php');
}