<?php
include("code/sites/modele/inventaire.php")
$entreprise_machine = getEntrepriseByMachine($_GET["id"]);
if($entreprise_machine == $_SESSION["id_user"]){
	if(!isset($_GET["c"])){
		echo "Page supervision";
	}elseif ($_GET["c"] == "inv") {
		echo "Page inventaire";
	}elseif ($_GET["c"] == "alertes") {
		$nom_entreprise = getEntrepriseById($_GET["id"])["nom"];
		$nom_machine = getMachineById($_SESSION["id_user"])["nom"];
		$html = liste_alertes($nom_entreprise,$nom_machine);
		echo $html;
	}else{
		include("vue/page_404.php");
	}


}else{
	include("vue/page_404.php");
}

?>