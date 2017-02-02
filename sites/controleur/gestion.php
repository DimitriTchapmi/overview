<?php
include("code/sites/modele/inventaire.php");
include("code/sites/modele/serveur.php");
var_dump($_SESSION["id_user"]);
	if(isset($_SESSION["id_user"])){
                $infos = getMachineById($_POST["machine"][0]);
                $entreprise = getEntrepriseById($_SESSION["id_user"])["nom"];
		if(isset($_POST["action"])){
                        $groupes_machine = liste_groupes($entreprise);
                        $gr_machine = GetGroupeByMachine($infos["id"])["groupe"];
			var_dump($groupes_machine);
		        $tags_gestion = "";
		        $tags_machine = getTagsByMachine($_POST["machine"][0]);
		      for($i=0;$i<count($tags_machine);$i++) {
			$tags_gestion = $tags_gestion."<button class='btn btn-default tags' value='".$i."'>".$tags_machine[$i]["nom"]."</button> <input type='hidden' name='tags[]' id='tag".$i."' value='".$tags_machine[$i]["nom"]."'>";
		      }		
                        include("code/sites/vue/gestion_test.php");
                }elseif (isset($_POST["add_groupe"])) {
        	       exec("sudo mkdir projets/".$nom_epse."/inventaire/".$_POST["nom"]);
        	       include("code/sites/vue/connexion.php");
                }elseif (isset($_POST["add_tags"])) {
        	       foreach ($_POST["machine"] as $machine){
        	       add_tag($_POST["tag"],$machine);
        	       }
                }
        }else{
                include("code/sites/vue/connexion.php");
	}
	


?>
