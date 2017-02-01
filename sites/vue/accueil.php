<?php
include ('header.php');
?>

<!-- Slider Starts -->
<div id="myCarousel" class="carousel slide banner-slider animated bounceInDown" data-ride="carousel">     
      <div class="carousel-inner">
        <!-- Item 1 -->
      <div class="item active">
        <img src="code/sites/img/1.jpg">
        <div class="carousel-caption">
          <h2 class="txt-carousel"><b>Inventaire</b></h2>
          
        </div>      
      </div>

     <div class="item">
        <img src="code/sites/img/2.jpg" >
        <div class="carousel-caption">
          <h2 class="txt-carousel"><b>Supervision</b></h2>
          
        </div>      
      </div>
    
      <div class="item">
        <img src="code/sites/img/3.jpg">
        <div class="carousel-caption">
          <h2 class="txt-carousel"><b>Alertes</b></h2>
          
        </div>      
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="icon-prev"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="icon-next"></i></span></a>
    </div>
      
    </div>
<!-- #Slider Ends -->

<!-- Container (The Band Section) -->
<div class="container text-center">
  <img src="code/sites/img/logo.png">
    <h3> <b>Gardez une longueur d'avance ! </b> </h3>
    <p>OverView est une solution de supervision, d’inventaire et de gestion d’alertes en ligne permettant à un utilisateur de surveiller ses équipements fonctionnant sous Linux et d’être alerté en cas de problèmes.
    </p>

    <h3 class="text-center">NOS SERVICES</h3>

            <div class="serviceBox">
                <div class="service-icon">
                    <a href="#">
                        <i class="fa fa-list"></i>
                    </a>
                </div>
                <div class="service-content">
                    <h3>Inventaire</h3>
                    <p style="color: black" >Ici, vous pouvez consulter l'inventaire de tous vos équipements. Catégorisez les ensuite selon les caratéristiques matérielles, logicielles et via des Tags rajoutés par vous-même.</p>
                </div>
            </div>


            <div class="serviceBox">
                <div class="service-icon">
                    <a href="https://rainloop.com">
                        <i class="fa fa-area-chart"></i>
                    </a>
                </div>
                <div class="service-content">
                    <h3>Supervision</h3>
                    <p style="color: black">Dès la création d'un compte utilisateur, vous accédez à votre tableau de bord. Visualisez les données supervisées sous forme de tableaux et graphes. </p>
                </div>
            </div>

            <div class="serviceBox">
                <div class="service-icon">
                    <a href="https://jappix.com">
                        <i class="fa fa-bell-o"></i>
                    </a>
                </div>
                <div class="service-content">
                    <h3>Gestion des Alertes</h3>
                    <p>Nous offrons la possibilité pour chaque machine et pour chaque paramètre supervisable, de définir un seuil au-delà duquel l’entreprise sera prévenue dans son compte par une icône sur la machine concernée.</p>
                </div>
            </div>
        </div>
 <h2 style="text-align:center">Notre équipe</h2>
       <div class="row" style="margin:auto">
        <div class="col-sm-3 col-md-offset-1 text-center">
            <div class="our-team">
                <img src="code/sites/img/dimi.jpg" alt="">
                <div class="team-prof">
                    <h3>Dimitri</h3>
                    <span>Membre de l'équipe</span>
                </div>
            </div>
          </div>
          <div class="col-sm-3 text-center">
            <div class="our-team">
                <img src="code/sites/img/JC.jpg" alt="">
                <div class="team-prof">
                    <h3>Jean-Christophe</h3>
                    <span>Membre de l'équipe</span>
                </div>
            </div>
          </div>
          <div class="col-sm-3 text-center">
            <div class="our-team">
                <img src="code/sites/img/gui.jpg" alt="">
                <div class="team-prof">
                    <h3>Guillaume</h3>
                    <span>Chef de projet</span>
                </div>
            </div>
          </div>
    </div>
 </div>

    <!--<div class="col-sm-3 text-center">
      <p class="text-center"><strong>Jean-Christophe Thiburce</strong></p><br>
        <img src="img/JC.jpg" class="img-circle person" width="255" height="255">
        <p>Chef de projet</p>
    </div>
    <div class="col-sm-3 text-center">
      <p class="text-center"><strong>Guillaume Jaufret</strong></p><br>
        <img src="img/gui.jpg" class="img-circle person" width="255" height="255">
        <p>Membre de l'équipe</p>
    </div>
  </div>
 </div>
-->
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">Title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->    
</div>

<?php 
include ('footer.php');
?>