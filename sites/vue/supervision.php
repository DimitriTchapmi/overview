<?php
include ('header.php');
?>

<div class="tabcontainer text-center">
    <div> <h3> Graphes sur une heure </h3>
    <?php
    echo "<div class='col-lg-14' style='margin-top: 10px;'>";

    	for($i=0;$i<count($graphes["heure"]);$i++){
    		echo "<img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["heure"][$i]."'></div>";
    	}
            ?>

    <div> <h3> Graphes sur une journée </h3>
    <?php
    echo "<div class='col-lg-14' style='margin-top: 10px;'>";
         	for($i=0;$i<count($graphes["jour"]);$i++){
    		echo "<img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["jour"][$i]."'></div>";
    	}
        
    ?>

    <div> <h3> Graphes sur une semaine </h3>
    <?php
        echo"<div class='col-lg-14' style='margin-top: 10px;'>";
    	for($i=0;$i<count($graphes["semaine"]);$i++){
    		echo "<img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["semaine"][$i]."'></div>";
    	}
    ?>