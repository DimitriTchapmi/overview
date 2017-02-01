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
echo '<h2 class="login-header">Gestion de la machine '.$infos["nom"].'</h2>';?>
  <form action="inventaire" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
    <?php echo '<label class="control-label" for="nom">Groupe</label>
    <select name="groupe"><option value="'.$gr_machine.'">'.$gr_machine.'</option>';
    foreach ($groupes_machine as $groupe) {
      # code...
    }{
      echo"<option value='".$groupe."'>".$groupe."</option>";
    }
    echo'</select>';
    echo'<input type="hidden" name="id" value="'.$infos["id"].'">
    <br><br>';?>
    <br><br>

               <label class="control-label" for="lieu">Tags</label>
               <input type="text" id="newtag" name="" placeholder="Ajouter des tags">
                <br><br>
               <a id="addtags" href="" class="btn"><i class="fa fa-plus"></i></a>
         <div id="tags">
         <?php echo $tags_gestion; ?>
        </div>

    <input type="submit" name="action" value="Modifier">
<br></br>

  </div>
  </form>




<?php
include 'footer.php';
?>
<script type="text/javascript">

  var i = $("#tags button").length;
  var j = 0;

$(document).on("click", "#addtags",  function(e){
  e.preventDefault();
  i++;
  var html = $("#tags").html();
  $("#tags").html(html+"     <button class='btn btn-default tags' value='"+i+"'>"+$('#newtag').val()+"</button> <input type='hidden' name='tags[]' id='tag"+i+"' value='"+$("#newtag").val()+"'>");


  }); 

$(document).on("click", ".tags",  function(e){
  e.preventDefault();
  var val = $(this).val();
  $(this).remove();
  var nom_tag = $("#tag"+val).val();
  $("#tag"+val).remove();
  var html = $("#tags").html();
  $("#tags").html(html+"     <input type='hidden' name='rm_tags[]' id='tag"+i+"' value='"+nom_tag+"'>");
});



</script>