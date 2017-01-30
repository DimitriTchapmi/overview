<?php

function liste_groupes($entreprise){
	 exec("ls -l projets/".$entreprise."/inventaire | grep ^d |cut -d' ' -f19",$groupes);
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
		$html_alertes = $html_alertes."Alerte".$nom_item." à ".$seuil."% et battement de ".$battement."minutes.";
		if($flag == 1){
			$html_alertes = $html_alertes." ATTENTION ALERTE DECLENCHEE depuis ".$temps_atteint." minutes <br> </br>";
		}else{
			$html_alertes = $html_alertes."<br></br>";
		}
	}
	return $html_alertes;
}


?>