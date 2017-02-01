<!DOCTYPE html>
<html lang="fr">

<?php include ('header.php');


echo'<div class="tabcontainer">';
echo "<form action='gestion' method='post'>";
echo "<table class='table table-striped'>
<thead>";
echo "<tr>";
	echo "<td>Machines</td><td>Groupes</td><td>Tags</td></thead><tbody>";
for($i=0;$i<count($machines);$i++){
	$tags = getTagsByMachine($machines[$i]["id"]);
	echo "<tr>";
	echo "<td style='width:150px; height:25px;'> <a href='machine?id=".$machines[$i]["id"]."'>".$machines[$i]["nom"]."</a> </td>";
	echo "<td style='width:150px; height:25px;'>".$machines[$i]["groupe"]."</td>";
	$html_tags = tags_html($tags);
	echo "<td style='width:150px; height:25px;'>".$html_tags."</td>";
	echo "<td style='width:150px; height:25px;'><input type='checkbox' name='machine[]' value='".$machines[$i]["id"]."'></td>";
	echo "</tr>";
}
echo "
 </tbody>
  </table>
  <input name='action' class='btn btn-success btn btn-success' type='submit' value='Gérer'>
  </form>";
echo '<div class="col-md-5" style="padding-left: 0px;">';
echo '<h2 style="width: 400px; 
                 margin-bottom: 47px; 
                 margin-top: 40px;"> Groupes</h2>';
echo '<button type="button" class="btn btn-success btn btn-success"><a href="#" data-width="500" data-rel="popup1" class="poplight">Ajout de groupe</a></li>
              <div id="popup1" class="popup_block">
              <div class="login">
  <div class="login-triangle"></div>
  <h2 class="login-header">Ajout de groupe</h2>
  <form class="form-horizontal" action="gestion" role="form" method="post">
    <p><input type="text" name="nom" id="login" placeholder="nom"></p>
    <p><input type="submit" name="add_groupe" value="Ajouter"></p>
</div>
</div>
</button>
</div>
<div class="col-md-6">
<h2 style="width: 400px; margin-top: 40px; margin-bottom: 32px;"> Tags</h2>
<div class="form-group">
	<div class="col-md-5"><input name="tag"class="form-control" type="text"></div>
            <div class="col-md-offset0 col-sm-2"><input name="add_tags" class="btn btn-success btn btn-success" type="submit" value="Affecter ce tag" style="margin-top: 13px;"/></div>
                </div>
             </div>
             </div>
';
include("footer.php");
?>

