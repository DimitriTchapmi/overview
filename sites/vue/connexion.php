<?php
include('header.php');
?>
  <body>
<h2 style="margin:135px auto -120px; color:red;text-align:center">
<?php
echo $message;
?>
</h2>
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Connexion</h2>

  <form class="form-horizontal" role="form" action="connexion" method="post">
    <p><input type="text" name="nom" id="login" placeholder="Entreprise"></p>
    <p><input type="password" name="pass" id="pass" placeholder="Mot de passe"></p>
    <p><input type="submit" name="action" value="Connexion"></p>
  </form>
</div>
<?php
include ('footer.php');
?>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </body>

