<?php 
include 'header.php'; 
?>
<div class="login">
<?php echo "<h3>".$message."</h3>"; ?>
  <div class="login-triangle"></div>
  <h2 class="login-header">Inscription</h2>
  <form class="form-horizontal" role="form" method="post">
    <p><input type="text" name="nom" id="login" placeholder="Pseudo"></p>
    <p><input type="password" name="pass1" id="pass" placeholder="Mot de passe"></p>
    <p><input type="password" name="pass2" id="pass" placeholder="Confirmez mot de passe"></p>
    <p><input type="email" name="mail" id="pass" placeholder="Email"></p>
    <p><input type="submit" name="action" value="Inscription"></p>
  </form>
</div>
<?php
include 'footer.php';
?>

</body>
