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
$infos_alerte = preg_split("/_/", $_GET["modifier"]);

echo '<h2 class="login-header">Modification d une alerte</h2>';?>
  <form action="modif_alerte" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
    <?php echo'Item : '.$infos_alerte[0].'
    <input type="text" name="seuil" placeholder="'.$infos_alerte[1].'">
    <input type="text" name="seuil" placeholder="'.$infos_alerte[2].'">';
    echo '
    <input type="submit" name="modif" value="Modifier">
<br></br>

  </div>
  </form>';


include 'footer.php';
?>
