<?php
include ('header.php');
?>

<div class="tabcontainer text-center">
    <div> <h3> Graphes sur une heure </h3>
    <?php
        echo '<div class="row">';
    	for($i=0;$i<count($graphes["heure"]);$i++){
    		echo "<div class='col-lg-7' style='margin-top: 10px;'><img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["heure"][$i]."'></div>";
    	}
        echo '</div>';
    ?>

    <div> <h3> Graphes sur une journée </h3>
    <?php
     echo '<div class="row">';
    	for($i=0;$i<count($graphes["jour"]);$i++){
    		echo "<div class='col-lg-7' style='margin-top: 10px;'><img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["jour"][$i]."'></div>";
    	}
        echo '</div>';
    ?>

    <div> <h3> Graphes sur une semaine </h3>
    <?php
        echo '<div class="row">';
    	for($i=0;$i<count($graphes["semaine"]);$i++){
    		echo "<div class='col-lg-7' style='margin-top: 10px;'><img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["semaine"][$i]."'></div>";
    	}
    	echo '</div>';
    ?>