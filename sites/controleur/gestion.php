<?php
include("/modele/inventaire.php");

	if(isset($_SESSION["id_user"])){
		foreach ($_POST["machine"] as $machine){
		$infos = GetMachineById($machine);

		echo '<form action="inventaire" name="modifs" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                <div class="col-md-8"><input type="hidden" name="id[]" value="'.$infos["id"].'</div>
                <div class="col-md-8">'.$infos["nom"].'</div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-8"><input name="groupe[]"class="form-control" type="text" id="UserPassword" value="'.$infos["groupe"].'"" /></div>
                </div>';

		}
		echo '<div class="form-group">
                <div class="col-md-offset-0 col-md-8"><input name="action" class="btn btn-success btn btn-success" type="submit" value="modifier"/></div>
                </div>';
	}else{
		include("vue/connexion.php");
	}
	


?>