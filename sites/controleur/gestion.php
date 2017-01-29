<?php
include("modele/inventaire.php");

	if(isset($_SESSION["id_user"])){
		if(isset($_POST["action"])){
		$infos = GetMachineById($_POST["machine"][0]);
		$tags_gestion = "";
		$tags_machine = getTagsByMachine($_POST["machine"][0]);
			for($i=0;$i<count($tags_machine);$i++) {
				$tags_gestion = $tags_gestion."<button class='btn btn-default tags' value='".$i."'>".$tags_machine[$i]["nom"]."</button> <input type='hidden' name='tags[]' id='tag".$i."' value='".$tags_machine[$i]["nom"]."'>";
			}

		/*echo '<form action="inventaire" name="modifs" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                <div class="col-md-8"><input type="hidden" name="id[]" value="'.$infos["id"].'</div>
                <div class="col-md-8">'.$infos["nom"].'</div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-8"><input name="groupe[]"class="form-control" type="text" id="UserPassword" value="'.$infos["groupe"].'"" /></div>
                </div>';

		echo '<div class="form-group">
                <div class="col-md-offset-0 col-md-8"><input name="action" class="btn btn-success btn btn-success" type="submit" value="modifier"/></div>
                </div>';
        */include("vue/gestion_test.php");
        }elseif (isset($_POST["add_groupe"])) {
        	$nom_epse = getEntrepriseById($_SESSION["id_user"])["nom"];
        	//exec("sudo mkdir projets/".$nom_epse."/inventaire/".$_POST["nom"]);
        	echo "Vous avez ajouté le groupe".$_POST["nom"];
        }elseif (isset($_POST["add_tags"])) {
        	foreach ($_POST["machine"] as $machine){
        	add_tag($_POST["tag"],$machine);
        	}
        }
	}else{
		include("vue/connexion.php");
	}

	


?>