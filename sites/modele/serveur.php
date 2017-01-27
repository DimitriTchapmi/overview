<?php

function liste_groupes($entreprise){
	 exec("ls -l projets/".$entreprise."/inventaire | grep ^d |cut -d' ' -f19",$groupes);
        return $groupes;
}

?>