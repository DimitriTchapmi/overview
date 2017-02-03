<?php
include ('header.php');
?>
echo "<br></br><br></br><a href='machine?id=".$_GET["id"]."&c=inv'>Inventaire</a><br></br>";
echo "<a href='machine?id=".$_GET["id"].&c=alertes"'>Alertes</a><br></br>";
<div class="tabcontainer text-center"> 
    <h3> Graphes sur une heure </h3>
    <?php
    echo "<table class='table table-condensed' style='width: 55%;'>";
    	echo "<tbody>";
        for($i=0;$i<count($graphes["heure"]);$i++){
            echo "<tr>";
            echo "<td><img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["heure"][$i]."'></td>";
            echo "</tr>";    
        }
        echo "</tbody>";
        echo "</table>";
            ?> 
    <h3> Graphes sur une journée </h3>
    <?php
    echo "<table class='table table-condensed' style='width: 55%;'>";
            echo "<tbody>";
            for($i=0;$i<count($graphes["jour"]);$i++){
            echo "<tr>";    
            echo "<td><img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["jour"][$i]."'></td>"; 
            echo "</tr>";
        }
        echo "</tbody>"; 
        echo "</table>";
    ?>
    <h3> Graphes sur une semaine </h3>
    <?php
        echo "<table class='table table-condensed' style='width: 55%;'>";
    	echo "<tbody>";
        for($i=0;$i<count($graphes["semaine"]);$i++){ 
            echo "<tr>";
            echo "<td><img src='projets/".$nom_entreprise."/supervision/".$nom_machine."/graphes/".$graphes["semaine"][$i]."'></td>";
            echo "</tr>";
        }
        
        echo "</tbody>";
        echo "</table>";
    ?>
</div>    