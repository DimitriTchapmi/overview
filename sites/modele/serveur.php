<?php

function liste_groupes($entreprise){
	 exec("ls projets/".$entreprise."/inventaire",$groupes);
        return $groupes;
}

function liste_alertes($entreprise, $machine){
	exec("cat projets/".$entreprise."/supervision/".$machine."/alertes",$alertes);
	$html_alertes = "";
	for($i=0;$i<count($alertes);$i++){
		$champs = preg_split("/:/", $alertes[$i]);
		$nom_item= $champs[0];
		$seuil=$champs[1];
		$battement=$champs[2];
		$temps_atteint=$champs[3];
		$temps_redescendu=$champs[4];
		$flag=$champs[5];
		$html_alertes = $html_alertes."Alerte ".$nom_item." à ".$seuil."% et battement de ".$battement."minutes.";
		if($flag == 1){
			$html_alertes = $html_alertes." ATTENTION ALERTE DECLENCHEE depuis ".$temps_atteint." minutes <br> </br>";
		}else{
			$html_alertes = $html_alertes."<br></br>";
		}
	}
	return $html_alertes;
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