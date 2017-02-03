<!DOCTYPE html>
<html lang="fr">


<?php 
include ('header.php');
?>
<div class="container-fluid" style="margin-top: 150px;">
<div class="col-md-5" style="margin-bottom: 15px;">
<h2 style="margin-bottom: 25px;">Recherche</h2>

<form action='inventaire' method='post'>
<input type="text" name="champ" placeholder="nom,groupe,tag" style="color:black;">
 <input name='recherche' class='btn btn-success btn btn-success' type='submit' value='Rechercher'>
 </form>

<h2 style="width: 400px; 
                 margin-bottom: 47px; 
                 margin-top: 40px;"> Groupes</h2>
<button type="button" class="btn btn-success btn btn-success"><a href="#" data-width="500" data-rel="popup1" class="poplight">Ajout de groupe</a></button>
              <div id="popup1" class="popup_block">
              <div class="login">
  <div class="login-triangle"></div>
  <h2 class="login-header">Ajout de groupe</h2>
  <form class="form-horizontal" action="inventaire" role="form" method="post">
    <p><input type="text" name="nom" id="login" placeholder="nom"></p>
    <p><input type="submit" name="add_groupe" value="Ajouter"></p>
  </form>
  </div>
</div>
<h2 style="width: 400px; margin-top: 40px; margin-bottom: 32px;"> Tags</h2>
<div class="form-group" style="width: 80%;">    
  <input name="tag"class="form-control" style="position: absolute;"/>
            <input name="add_tags" class="btn btn-success btn btn-success" type="submit" value="Affecter ce tag" style="margin-left: 150px; margin-top: 13px;"/>
                </div>
</div>
<div class="col-md-5" style="margin-bottom: 15px;">
<?php
echo "<h2 style='margin-bottom: 40px;'> Machines de l'entreprise ".$nom_entreprise."</h2>";
?>
<form action='gestion' method='post'>
<table class='table table-bordered' style='width: 100%; text-align: center;'>
<thead>
<tr>
	<td>Machines</td><td>Groupes</td><td>Tags</td></thead><tbody>
<?php
for($i=0;$i<count($machines);$i++){
	$tags = getTagsByMachine($machines[$i]["id"]);
	echo "<tr>";
	echo "<td style='width: 100px; height: 25px;'> <a href='machine?id=".$machines[$i]["id"]."'>".$machines[$i]["nom"]."</a> </td>";
	echo "<td style='width: 100px; height: 25px;'>".$machines[$i]["groupe"]."</td>";
	$html_tags = tags_html($tags);
	echo "<td style='width: 100px; height: 25px;'>".$html_tags."</td>";
	echo "<td style='width: 10px; height: 25px;'><input type='checkbox' name='machine[]' value='".$machines[$i]["id"]."'></td>";
	echo "</tr>";
}
?>
 </tbody>
  </table>
  <input name='action' class='btn btn-success btn btn-success' type='submit' value='Gérer'>
    </form>
    </div>
</div>       
<?php
include("footer.php");

?>

