<?php

function liste_groupes($entreprise){
	 exec("ls projets/".$entreprise."/inventaire",$groupes);
        return $groupes;
}

function liste_alertes($entreprise, $machine){
	exec("cat projets/".$entreprise."/supervision/".$machine."/alertes",$alertes);
		$alertes_split = [];
	for($i=0;$i<count($alertes);$i++){
		$champs = preg_split("/:/", $alertes[$i]);
		$alertes_split[$i]["nom_item"]= $champs[0];
		$alertes_split[$i]["seuil"]=$champs[1];
		$alertes_split[$i]["battement"]=$champs[2];
		$alertes_split[$i]["temps_atteint"]=$champs[3];
		$alertes_split[$i]["temps_redescendu"]=$champs[4];
		$alertes_split[$i]["flag"]=$champs[5];
	}

	return $alertes_split;
	}

function ajouter_alerte($entreprise,$machine,$infos){
	$item = str_replace('_', '', $infos["item"]);
	exec("echo ".$item.":".$infos["seuil"].":".$infos["battement"].":0:0:0 >> projets/".$entreprise."/supervision/".$machine."/alertes");
}

function modifier_alerte($entreprise,$machine,$infos){
	exec("sed -i '/^".$infos["item"]."/ d' /var/www/overview/projets/".$entreprise."/supervision/".$machine."/alertes");
	exec("echo ".$infos["item"].":".$infos["seuil"].":".$infos["battement"].":0:0:0 >> /var/www/overview/projets/".$entreprise."/supervision/".$machine."/alertes");
}

function recuperer_inventaire($entreprise, $machine, $groupe){
	exec("cat projets/".$entreprise."/inventaire/".$groupe."/$machine/".$entreprise."_".$machine,$lignes);
	for($i=0;$i<count($lignes);$i++){
		echo $lignes[$i]."<br></br>";
	}
}

function recuperer_graphes($entreprise,$machine){
	$graphes = [];
	exec("ls projets/".$entreprise."/supervision/".$machine."/graphes | grep _3600",$graphes["heure"]);
	exec("ls projets/".$entreprise."/supervision/".$machine."/graphes | grep _86400",$graphes["jour"]);
	exec("ls projets/".$entreprise."/supervision/".$machine."/graphes | grep _604800",$graphes["semaine"]);
	return $graphes;
}

?>