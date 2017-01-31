<?php
include ('header.php');
?>

<div class="container text-center">
  <img src="img/eventizi.png">
    <p><em>Supervision : graphes</em></p>
    <div> <h3> Graphes sur une heure </h3>
    <?php
    	for($i=0;$i<count($graphes["heure"]);$i++){
    		echo "<img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["heure"][$i]."'>";
    	}
    ?>

    <div> <h3> Graphes sur une journée </h3>
    <?php
    	for($i=0;$i<count($graphes["jour"]);$i++){
    		echo "<img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["jour"][$i]."'>";
    	}
    ?>

    <div> <h3> Graphes sur une semaine </h3>
    <?php
    	for($i=0;$i<count($graphes["semaine"]);$i++){
    		echo "<img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["semaine"][$i]."'>";
    	}
    ?>