<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Overview</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="code/sites/img/logo.png" />

    
  <link rel="stylesheet" href="code/sites/vue/css/bootstrap.css">
  <link rel="stylesheet" href="code/sites/vue/css/style.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script>(function($) {
    if (!$.curCSS) {
       $.curCSS = $.css;
    }
})(jQuery);</script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
  <!--JS Bootstrap-->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!--<link rel="stylesheet" href="vue/css/perso.css">-->

  <!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- animate.css -->
<link rel="stylesheet" href="code/sites/vue/assets/animate/animate.css" />
<link rel="stylesheet" href="code/sites/vue/assets/animate/set.css" />

<!-- gallery -->
<link rel="stylesheet" href="code/sites/vue/assets/gallery/blueimp-gallery.min.css">

<!-- favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">


<link rel="stylesheet" href="code/sites/vue/assets/style.css">


<style>
.autocomplete-suggestions {
font-weight: light;
border: 2px solid #3079ED;
background: white ;
overflow: auto;
border-top-left-radius: 5pt 5pt;
border-bottom-left-radius: 5pt 5pt;
border-top-right-radius: 5pt 5pt;
border-bottom-right-radius: 5pt 5pt;
 }
.autocomplete-suggestion { font-weight: light; padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #D4E3FB; }
.autocomplete-suggestions strong { font-weight: bold; color: black; }
</style>
<style>
/*Style general de la page
body {font:14px verdana, sans-serif;background:#000000;color:#C0C0C0;font-weight:bold;}
/*Styles relatifs à la shadow box*/
/*Style du masque recouvrant la page au chargement de la shadow box*/
#page {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
/*Positionnement et dimensions de la shadow box*/
#boxes .window {position:absolute;left:0;top:0;width:440px;height:200px;display:none;z-index:9999;padding:20px;}
#boxes #dialog {width:400px;height:400px;padding:10px;color:#00008B;border:3px solid #fff;background-color:#C0C0C0;}
/*Style du bouton*/
.shadowbox{position:absolute;left:50%;top:50%;width:100px;}
</style>
<style> 
input[type=text] {
    width: 140px;
    box-sizing: border-box;
    border: 2px solid #000;
    border-radius: 4px;
    font-size: 16px;
    background-color: #;
    background-image: url('search.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 30px 20px 12px 20px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>
</head>
<body>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
            <a href="/"><img src="code/sites/img/logo.png" style=" height:90px;margin-top:1px;"></a>


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>
      <!-- Nav Starts -->

      <!--Il faut mettre variable php pour <li class="active" selon la page -->
      <div class="navbar-collapse  collapse">
        <ul class="nav navbar-nav navbar-right scroll">
            <?php
            if(isset($_SESSION["id_user"])){
              echo'<li><input type="text" name="search" placeholder="Rechercher..." style="color:black;"></li><li><a href="/inventaire">Inventaire</a></li>
              <li><a href="#" data-width="500" data-rel="popup1" class="poplight">Ajouter Machine</a></li>
                            <div id="popup1" class="popup_block">
                            <div class="login">
                <div class="login-triangle"></div>
                <h2 class="login-header">Comment ça marche ?</h2>
                <form class="form-horizontal" role="form" method="post">
                  <ul> 
                    <li><p>Téléchargez le dossier d\'installation <a target="_blank" href="https://github.com/DimitriTchapmi/overview_installation">ici</a> oubien faite le clone du dépôt git.</p></li>
                      <p style="background:#A7A37E" >sudo git clone https://github.com/DimitriTchapmi/overview_installation</p>
                      <li><p>Donnez le droit d\'exécution aux scripts. </p></li>
                      <p style="background:#A7A37E" >sudo chmod +x /chemin/script_install.sh</p>
                      <li><p>Excécutez le script "script_install.sh" en tant qu\'administrateur (root).</p></li>
                      <p style="background:#A7A37E">cd  /chemin/ ensuite sudo ./script_install.sh </p>
                      <p> Connectez-vous enuite à votre compte OverView et consultez les résultats de supervision.</p>
                  </ul>
                </form>
              </div>
              </div>
              <li><a href="/deconnexion">Se déconnecter</a></li>';
            } else {
              echo '<li><a href="#" data-width="500" data-rel="popup1" class="poplight">Connexion</a></li>
              <div id="popup1" class="popup_block">
              <div class="login">
  <div class="login-triangle"></div>
  <h2 class="login-header">Connexion</h2>
  <form class="form-horizontal" action="connexion" role="form" method="post">
    <p><input type="text" name="nom" id="login" placeholder="Pseudo"></p>
    <p><input type="password" name="pass" id="pass" placeholder="Mot de passe"></p>
    <p><input type="submit" name="action" value="Connexion"></p>
  </form>
</div>
</div>
<li><a href="#" data-width="500" data-rel="popup2" class="poplight">Inscription</a></li>
<div id="popup2" class="popup_block">
<div class="login">
  <div class="login-triangle"></div>
  <h2 class="login-header">Inscription</h2>
  <form class="form-horizontal" action="inscription" role="form" method="post">
    <p><input type="text" name="nom" id="login" placeholder="Pseudo"></p>
    <p><input type="password" name="pass1" id="pass" placeholder="Mot de passe"></p>
    <p><input type="password" name="pass2" id="pass" placeholder="Confirmez mot de passe"></p>
    <p><input type="email" name="mail" id="pass" placeholder="Email"></p>
    <p><input type="submit" name="action" value="Inscription"></p>
  </form>
</div>
</div>';             
            }
            ?>
              <!-- Bouton execution modal -->


              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>
    <script type="text/javascript">
      jQuery(function($){
                     
  //Lorsque vous cliquez sur un lien de la classe poplight
  $('a.poplight').on('click', function() {
    var popID = $(this).data('rel'); //Trouver la pop-up correspondante
    var popWidth = $(this).data('width'); //Trouver la largeur

    //Faire apparaitre la pop-up et ajouter le bouton de fermeture
    $('#' + popID).fadeIn().css({ 'width': popWidth}).prepend('<a href="#" class="close"><img src="code/sites/img/close-button.jpg" class="btn_close" title="Close Window" alt="Close" /></a>');
    
    //Récupération du margin, qui permettra de centrer la fenêtre - on ajuste de 80px en conformité avec le CSS
    var popMargTop = ($('#' + popID).height() + 80) / 2;
    var popMargLeft = ($('#' + popID).width() + 80) / 2;
    
    //Apply Margin to Popup
    $('#' + popID).css({ 
      'margin-top' : -popMargTop,
      'margin-left' : -popMargLeft
    });
    
    //Apparition du fond - .css({'filter' : 'alpha(opacity=80)'}) pour corriger les bogues d'anciennes versions de IE
    $('body').append('<div id="fade"></div>');
    $('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();
    
    return false;
  });
  
  
  //Close Popups and Fade Layer
  $('body').on('click', 'a.close, #fade', function() { //Au clic sur le body...
    $('#fade , .popup_block').fadeOut(function() {
      $('#fade, a.close').remove();  
  }); //...ils disparaissent ensemble
    
    return false;
  });

  
});
    </script>
<!-- #Header Starts -->
</body>


       

