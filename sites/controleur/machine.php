<?php
include("code/sites/modele/inventaire.php");
include("code/sites/modele/serveur.php");
$entreprise_machine = getEntrepriseByMachine($_GET["id"]);
if($entreprise_machine == $_SESSION["id_user"]){
	$nom_entreprise = getEntrepriseById($_SESSION["id_user"])["nom"];
	$nom_machine = getMachineById($_GET["id"])["nom"];
	$groupe_machine = GetGroupeByMachine($_GET["id"]);

	if(!isset($_GET["c"])){
		echo "Page supervision";
	}elseif ($_GET["c"] == "inv") {
		recuperer_inventaire($nom_entreprise,$nom_machine,$groupe_machine);
	}elseif ($_GET["c"] == "alertes") {
		$html = liste_alertes($nom_entreprise,$nom_machine);
		echo $html;
	}else{
		include("vue/page_404.php");
	}


}else{
	include("vue/page_404.php");
}

?>