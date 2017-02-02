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
		if(isset($_GET["a"])){
			include("code/sites/controleur/modif_alerte.php");
		}else{
			if(isset($_POST["modif_alerte"])){
				var_dump($_POST);
				modifier_alerte($nom_entreprise,$nom_machine,$_POST);
			}
			if(isset($_POST["Supprimer"])){
				supprimer_alertes($nom_entreprise,$nom_machine,$_POST);
			}

			$items = getMaterielByMachine($_GET["id"]);
			$html_items = "Item <select name='item'>";
			for($i=0;$i<count($items);$i++){
				$html_items = $html_items."<option value='".$items[$i]["nom"]."'>".$items[$i]["nom"]."</option>";
			}

			if(isset($_POST["add_alerte"])){
				ajouter_alerte($nom_entreprise,$nom_machine,$_POST);
			}
			$alertes = liste_alertes($nom_entreprise,$nom_machine);
			include("code/sites/vue/alertes.php");
		}

	}else{
		include("code/sites/vue/page_404.php");
	}


}else{
	include("code/sites/vue/page_404.php");
}

?>