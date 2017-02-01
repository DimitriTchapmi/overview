<?php
include ('header.php');
?>

<div class="tabcontainer text-center">
<div class="row"> 
    <h3> Graphes sur une heure </h3>
    <?php
    echo "<table class='table table-striped'>";
    	for($i=0;$i<count($graphes["heure"]);$i++){
    		echo "<tbody>";
            echo "<tr>";
            echo "<td style='width: 300px; height: 100px;'><img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["heure"][$i]."'></td>";
    	    echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
            ?>
          </div>  
    <div class="row">
    <h3> Graphes sur une journée </h3>
    <?php
    echo "<table class='table table-striped'>";
         	for($i=0;$i<count($graphes["jour"]);$i++){
            echo "<tbody>";
            echo "<tr>";
            echo "<td style='width: 300px; height: 100px;'><img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["jour"][$i]."'></td>";
    	    echo "</tr>";
            echo "</tbody>";  
        }
        echo "</table>";
    ?>
    </div> 
    <div class="row">
    <h3> Graphes sur une semaine </h3>
    <?php
        echo "<table class='table table-striped'>";
    	for($i=0;$i<count($graphes["semaine"]);$i++){
            echo "<tbody>";
            echo "<tr>";
            echo "<td style='width: 300px; height: 100px;'><img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["semaine"][$i]."'></td>";
    	    echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
    ?></div>
</div>    