<?php
include("code/sites/modele/inventaire.php");
include("code/sites/modele/serveur.php");
$entreprise_machine = getEntrepriseByMachine($_GET["id"]);
if($entreprise_machine == $_SESSION["id_user"]){
	if(!isset($_GET["c"])){
		echo "Page supervision";
	}elseif ($_GET["c"] == "inv") {
		echo "Page inventaire";
	}elseif ($_GET["c"] == "alertes") {
		$nom_entreprise = getEntrepriseById($_SESSION["id_user"])["nom"];
		$nom_machine = getMachineById($_GET["id"])["nom"];
		$html = liste_alertes($nom_entreprise,$nom_machine);
		echo $html;
	}else{
		include("vue/page_404.php");
	}


}else{
	include("vue/page_404.php");
}

?>