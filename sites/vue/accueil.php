<?php
include ('header.php');
?>

<!-- Slider Starts -->
<div id="myCarousel" class="carousel slide banner-slider animated bounceInDown" data-ride="carousel">     
      <div class="carousel-inner">
        <!-- Item 1 -->
      <div class="item active">
        <img src="img/1.jpeg">
        <div class="carousel-caption">
          <h2 class="txt-carousel">Héberger votre évènement en toute tranquilité</h2>
          <h3 class="txt-carousel">Laissez parler votre créativité grâce à nos services proposés (compte mail : alias par évènement,compte chat)</h3>
        </div>      
      </div>

     <div class="item">
        <img src="img/2.jpg" >
        <div class="carousel-caption">
          <h2 class="txt-carousel">Moteur de recherche</h2>
          <h3 class="txt-carousel">Avec notre moteur de recherche intégré, trouver l'évènement qui vous correspond à votre univers.</h3>
        </div>      
      </div>
    
      <div class="item">
        <img src="img/3.jpg">
        <div class="carousel-caption">
          <h2 class="txt-carousel">Vous voulez vous faire connaitre ?</h2>
          <h3 class="txt-carousel">Event'izi est là pour vous apporter plus de visibilité</h3>
        </div>      
      </div>
    </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon-chevron-left"><i class="fa fa-angle-left"></i></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon-chevron-right"><i class="fa fa-angle-right"></i></span></a>
    </div>
<!-- #Slider Ends -->

<!-- Container (The Band Section) -->
<div class="container text-center">
  <img src="img/eventizi.png">
    <p><em>Créer votre évènement devient facile !</em></p>
    <p>Event'Izi vous permet d'héberger votre évènement et dispose de nombreuses fonctionnalités permettant de le promouvoir facilement.
    Une plateforme où vous pouvez créer et héberger votre site web pour votre évènement
    </p>

    <h3 class="text-center">NOS SERVICES</h3>

            <div class="serviceBox">
                <div class="service-icon">
                    <a href="#">
                        <i class="fa fa-globe"></i>
                    </a>
                </div>
                <div class="service-content">
                    <h3>Hébergement Web</h3>
                    <p>Ici, vous pouvez héberger votre site d'évenement avec le choix de templates pour tout type d'évènement, ou d'importer votre propre site. Vous avez la possibilité d'héberger autant de sites que vous le souhaitez, du type "évènement".eventizi.itinet.fr</p>
                </div>
            </div>


            <div class="serviceBox">
                <div class="service-icon">
                    <a href="https://rainloop.com">
                        <i class="fa fa-envelope"></i>
                    </a>
                </div>
                <div class="service-content">
                    <h3>Hébergement Mail</h3>
                    <p>Dès la création d'un compte utilisateur, vous disposez d'une boîte mail personnel "utilisateur"@eventizi.itinet.fr et d'un alias du type "évènement"@eventizi.itinet.fr qui renverra à votre évènement</p>
                </div>
            </div>

            <div class="serviceBox">
                <div class="service-icon">
                    <a href="https://jappix.com">
                        <i class="fa fa-users"></i>
                    </a>
                </div>
                <div class="service-content">
                    <h3>Service de chat</h3>
                    <p>Dès la création d'un compte utilisateur, vous disposez d'un compte chat "utilisateur"@eventizi.itinet.fr qui vous permettra de discuter avec les organisateurs et les participants d'un évènement</p>
                </div>
            </div>
        </div>
 <h2 style="text-align:center">Notre équipe</h2>
       <div class="row" style="margin:auto">
        <div class="col-sm-3 col-md-offset-1 text-center">
            <div class="our-team">
                <img src="../img/dimi.jpg" alt="">
                <div class="team-prof">
                    <h3>DimiBrownZyx</h3>
                    <span>Membre de l'équipe et sapeur officiel overview</span>
                </div>
            </div>
          </div>
          <div class="col-sm-3 text-center">
            <div class="our-team">
                <img src="../img/JC.jpg" alt="">
                <div class="team-prof">
                    <h3>Jean-Christophe Thiburce</h3>
                    <span>Membre de l'équipe charos en chef</span>
                </div>
            </div>
          </div>
          <div class="col-sm-3 text-center">
            <div class="our-team">
                <img src="../img/gui.jpg" alt="">
                <div class="team-prof">
                    <h3>Guillaume Jauffret</h3>
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