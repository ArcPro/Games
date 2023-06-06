<?php session_start(); include_once "../server/utils.php";include_once "../server/database.php"; ?>
<script>
    navOne = document.getElementById("nav-one");navOne.classList.add("active");
    navTwo = document.getElementById("nav-two");navTwo.classList.remove(navTwo.classList.item(1));;
    navThree = document.getElementById("nav-three");navThree.classList.remove(navThree.classList.item(1));
    profileImage = document.getElementById("profile-main-picture");
    profileImage.style.border = "0px";
  </script>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1" class=""></li>
      <li data-target="#myCarousel" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item">
        <img src="image/slide3.jpg" style="height:500px;">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>Example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button" style="margin-bottom:100px;">Sign up today</a></p>
          </div>
        </div>
      </div>
      <?php
      if (!isset($_SESSION["uuid"])) {
        echo '
        <div class="carousel-item active">
        <img src="image/slide1.jpg" style="height:500px;">
        <div class="container">
          <div class="carousel-caption">
            <h1>Bienvenue.</h1>
            <p>Rejoignez votre site d\'echecs en ligne avec plus de ' . TotalMembers() . 'membres actifs !</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button" style="margin-bottom:100px;">Rejoignez nous</a></p>
          </div>
        </div>
      </div>
        ';
      }
      else {
        echo '
        <div class="carousel-item active">
        <img src="image/slide1.jpg" style="height:500px;">
        <div class="container">
          <div class="carousel-caption">
            <h1>Faites une partie.</h1>
            <p>Jouez à votre site d\'echecs en ligne avec plus de ' . TotalMembers() . ' membres actifs !</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button" style="margin-bottom:100px;">Jouer</a></p>
          </div>
        </div>
      </div>
        ';
      }

      ?>
      
      <div class="carousel-item">
        <img src="image/slide2.jpg" style="height:500px;">
        <div class="container">
          <div class="carousel-caption text-right">
            <h1>Classement.</h1>
            <p>Un classement est désormais disponible, il prend en compte votre ratio de victoires pour déterminer votre place.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button" style="margin-bottom:100px;">Parcourir le classement</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Suivant</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Précédent</span>
    </a>
  </div>