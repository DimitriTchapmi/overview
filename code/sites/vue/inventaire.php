<!DOCTYPE html>
<html lang="fr">

<?php include ('header.php');


echo'<div class="tabcontainer">
<h2 style="margin:135px auto -120px; color:red;text-align:center"></h2>';

echo "<div class='tabcontainer' style='margin-bottom: 50px;'>";
echo "<form action='gestion' method='post'>";
echo "<table class='table table-striped'>
<thead>";
echo "<tr>";
	echo "<td>Machine</td><td>Groupe</td><td>Tags</td></thead><tbody>";
for($i=0;$i<count($machines);$i++){
	$tags = getTagsByMachine($machines[$i]["id"]);
	echo "<tr>";
	echo "<td> <a href='machine?id=".$machines[$i]["id"]."'>".$machines[$i]["nom"]."</a> </td>";
	echo "<td>".$machines[$i]["groupe"]."</td>";
	$html_tags = tags_html($tags);
	echo "<td>".$html_tags."</td>";
	echo "<td><input type='checkbox' name='machine[]' value='".$machines[$i]["id"]."'></td>";
	echo "</tr>";
}
echo "
 </tbody>
  </table>";
echo '<div class="col-md-offset-0 col-md-1" style="padding-left: 1px;"><input name="action" class="btn btn-success btn btn-success" type="submit" value="Gérer"></div>';
echo '<h2 style="width: 918px; 
                 margin-bottom: 47px; 
                 margin-top: 83px;"> Groupes</h2>';
echo '<button type="button" class="btn btn-success btn btn-success"><a href="#" data-width="500" data-rel="popup1" class="poplight">Ajout de groupe</a></li>
              <div id="popup1" class="popup_block">
              <div class="login">
  <div class="login-triangle"></div>
  <h2 class="login-header">Ajout de groupe</h2>
  <form class="form-horizontal" action="gestion" role="form" method="post">
    <p><input type="text" name="nom" id="login" placeholder="nom"></p>
    <p><input type="submit" name="add_groupe" value="Ajouter"></p>
</div>
</div></div></button>';
echo '<div class="col-md-4">';
echo "<h2> Tags</h2>";
echo  'Tag <div class="form-group">
<div class="col-md-3"><input name="tag"class="form-control" type="text"></div>
                </div>
                <div class="col-md-offset0 col-sm-2"><input name="add_tags" class="btn btn-success btn btn-success" type="submit" value="Affecter ce tag"/></div>
                </div>';

echo "</form>";
echo '</div>';

//include("footer.php");
?>

