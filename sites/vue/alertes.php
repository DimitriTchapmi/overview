<!DOCTYPE html>
<html lang="fr">

<?php include ('header.php');

?>

<h3> Alertes en cours </h3>

<?php echo "$html"."<br></br>";

echo '<h2 style="width: 400px; 
                 margin-bottom: 47px; 
                 margin-top: 40px;"> Groupes</h2>';
echo '<button type="button" class="btn btn-success btn btn-success"><a href="#" data-width="500" data-rel="popup1" class="poplight">Ajouter une alerte</a></li>
              <div id="popup1" class="popup_block">
              <div class="login">
  <div class="login-triangle"></div>
  <h2 class="login-header">Ajout d une alerte</h2>
  <form class="form-horizontal" action="machine?id='.$_GET["id"].'&c=alertes" role="form" method="post">
  	  <select name="item">
  	  '.$html_items.'
    <p><input type="text" name="seuil" id="login" placeholder="seuil"></p>
    <p><input type="text" name="battement" id="login" placeholder="battement"></p>
    <p><input type="submit" name="add_alerte" value="Ajouter"></p>
    </form>
</div>
</div>
</button>
</div>';

?>
