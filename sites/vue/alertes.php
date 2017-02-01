<!DOCTYPE html>
<html lang="fr">

<?php include ('header.php');

?>
<br></br>

<?php 
echo "<br></br><br></br><a href='machine?id=".$_GET["id"]."&c=inv'>Inventaire</a><br></br>";
echo "<a href='machine?id=".$_GET["id"]."'>Supervision</a><br></br>";
echo "<h3> Alertes en cours </h3>";

echo "<form action='machine?id=".$_GET["id"]."&c=alertes&a=modif' method='post'>";
echo "<table class='table table-striped' style='width: 55%;'>
<thead>";
echo "<tr>";
  echo "<td>Item</td><td>Battement</td><td>Etat</td></thead><tbody>";
for($i=0;$i<count($alertes);$i++){
  echo "<tr>";
  echo "<td style='width: 100px; height: 25px;'>".$alertes[$i]["nom_item"]."</td>";
  echo "<td style='width: 100px; height: 25px;'>".$alertes[$i]["battement"]."</td>";
  if($alertes[$i]["flag"] == 1 ){
    echo "<td style='width: 100px; height: 25px;'>Alerte déclenchée depuis".$alertes[$i]["temps_atteint"]."</td>";
  }
  echo '<input type="radio" name="modifier" value="'.$alertes[$i]["item"].'">';
  echo "</tr>";
}
echo '</tbody>
  </table><p><input type="submit" name="modif_alerte" value="Modifier"></p>
    </form>';

echo '<button type="button" class="btn btn-success btn btn-success"><a href="#" data-width="500" data-rel="popup1" class="poplight">Ajouter une alerte</a></li>
              <div id="popup1" class="popup_block">
              <div class="login">
  <div class="login-triangle"></div>
  <h2 class="login-header">Ajout d une alerte</h2>
  <form class="form-horizontal" action="machine?id='.$_GET["id"].'&c=alertes" role="form" method="post">
  	  '.$html_items.'
  	  </select>
    <p><input type="text" name="seuil" id="login" placeholder="seuil"></p>
    <p><input type="text" name="battement" id="login" placeholder="battement"></p>
    <p><input type="submit" name="add_alerte" value="Ajouter"></p>
    </form>
</div>
</div>
</button>
</div>';

?>
