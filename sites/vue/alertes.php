<!DOCTYPE html>
<html lang="fr">

<?php include ('header.php');

?>


<div class="login-triangle"></div>
<h1> Ajouter une alerte </h1>
<?php echo'<form class="form-horizontal" action="machine?id='.$_GET["id"].'&c=alertes" role="form" method="post">';
echo "<select>";

for($i=0;$i<count($items);$i++){
	echo "<option value='".$items[$i]["nom"]."'>".$items[$i]["nom"]."</option>";
}

?>
</select>
<p><input type="text" name="seuil" placeholder="seuil"></p>
<p><input type="text" name="battement" placeholder="battement"></p>
<p><input type="submit" name="add_alerte" value="Ajouter"></p>
</form>
</div>
<?php echo "$html"; ?>