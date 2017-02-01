<?php
include ('header.php');
?>

<div class="tabcontainer text-center">
<div class="row"> 
    <h3> Graphes sur une heure </h3>
    <?php
    	for($i=0;$i<count($graphes["heure"]);$i++){
    		echo "<div class='col-lg-5' style='margin-top: 10px;'><img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["heure"][$i]."'></div>";
    	}
            ?>
          </div>  
    <div class="row">
    <h3> Graphes sur une journée </h3>
    <?php
         	for($i=0;$i<count($graphes["jour"]);$i++){
    		echo "<div class='col-lg-5' style='margin-top: 10px;'><img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["jour"][$i]."'></div>";
    	}
        
    ?>
    </div> 
    <div class="row">
    <h3> Graphes sur une semaine </h3>
    <?php
        
    	for($i=0;$i<count($graphes["semaine"]);$i++){
    		echo "<div class='col-lg-5' style='margin-top: 10px;'><img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["semaine"][$i]."'></div>";
    	}
    ?></div>
</div>    