<?php
include("code/sites/modele/inventaire.php");
include("code/sites/modele/serveur.php");
$entreprise_machine = getEntrepriseByMachine($_GET["id"]);
if($entreprise_machine == $_SESSION["id_user"]){
	$nom_entreprise = getEntrepriseById($_SESSION["id_user"])["nom"];
	$nom_machine = getMachineById($_GET["id"])["nom"];
	$groupe_machine = GetGroupeByMachine($_GET["id"])["groupe"];

	if(!isset($_GET["c"])){
		$graphes = recuperer_graphes($nom_entreprise,$nom_machine);
		include("code/sites/vue/supervision.php");
	}elseif ($_GET["c"] == "inv") {
		recuperer_inventaire($nom_entreprise,$nom_machine,$groupe_machine);
	}elseif ($_GET["c"] == "alertes") {
		$items = getMaterielByMachine($_GET["id"]);
		if(isset($_POST["add_alerte"])){
			ajouter_alerte($nom_entreprise,$nom_machine,$_POST);
		}
		$html = liste_alertes($nom_entreprise,$nom_machine);
		include("code/sites/vue/alertes.php");


	}else{
		include("code/sites/vue/page_404.php");
	}


}else{
	include("code/sites/vue/page_404.php");
}

?>