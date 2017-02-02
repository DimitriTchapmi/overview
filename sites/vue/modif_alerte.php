<?php

include ('header.php');
?>

<link rel="stylesheet" type="text/css" href="vue/css/chosen.min.css" />  
<link rel="stylesheet" type="text/css" href="vue/css/fileinput.css" /> 
<link href="vue/css/bootstrap-datetimepicker.min.css" rel="stylesheet" > 


<script type="text/javascript" src="vue/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="vue/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="vue/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script type="text/javascript" src="vue/js/moment.js"></script>
<script type="text/javascript" src="vue/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="vue/js/locales/fr.js"></script>
 <!-- afarkas.github.io/webshim/demos/index.html q-->
 <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>

<script>
   webshims.setOptions('forms-ext', {types: 'date'});
   webshims.polyfill('forms forms-ext');
</script>
<div class="event">
<div class="login-triangle"></div>
<?php //echo $message; 
$infos_alerte = preg_split("/_/", $_POST["modifier"]);

echo '<h2 class="login-header">Modification d une alerte</h2>';
  echo '<form action="machine?id='.$_GET["id"].'&c=alertes" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">';
  echo'Item : '.$infos_alerte[0].'
    <br></br>Seuil : <input type="text" name="seuil" value="'.$infos_alerte[1].'">
    Battement : <input type="text" name="battement" value="'.$infos_alerte[2].'">
    <input type="hidden" name="item" value="'.$infos_alerte[0].'">';
    echo '
    <input type="submit" name="modif_alerte" value="Modifier">
    <input type="submit" name="supprimer" value="Supprimer">
<br></br>

  </div>
  </form>';


include 'footer.php';
?>
