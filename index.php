<?php
include "include.php";

?>

<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="voyageExpress/css/main.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
    crossorigin="anonymous"></script>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VoyageExpress</title>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
</head>

<body id="home" class="scrollspy">
  <!-- Navbar -->
  <div class="navbar-fixed">
    <nav class="blue">
      <div class="container">
        <div class="nav-wrapper">
          <a href="#" class="brand-logo">VoyageExpress</a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger">
            <i class="material-icons">menu</i>
          </a>
          <ul class="right hide-on-med-and-down">
            <li>
              <a href="#home">Home</a>
            </li>
            <li>
              <a href="#Recherche">Recherche</a>
            </li>
            <li>
              <a href="#popular">Destinations populaires</a>
            </li>
            <li>
              <a href="#gallery">Gallery</a>
            </li>
            <li>
              <a href="#contact">Contact</a>
            </li>
            <li>
              <div class="container center">
                <a href="#login" class="btn btn-large teal modal-trigger">Login</a>
              </div>
              
              <div id="login" class="modal teal-text">
                <h5 class="modal-close">&#10005;</h5>
                <div class="modal-content center">
                  <h4>Login Form</h4>
                  <br>
              
                  <form action="#">
              
                    <div class="input-field">
                      <i class="material-icons prefix">person</i>
                      <input type="text" id="name">
                      <label for="name">Username</label>
                    </div>
                    <br>
              
                    <div class="input-field">
                      <i class="material-icons prefix">lock</i>
                      <input type="password" id="pass">
                      <label for="pass">Password</label>
                    </div>
                    <br>
              
                    <div class="left" style="margin-left:20px;">
                    <div class="input-field col s12">
                          <select>
                            <option value="" disabled selected>Account Type</option>
                            <option value="1">Admin</option>
                            <option value="2">Utilisateur</option>
                          </select>
                        </div>

                    </div>
                    <br>
                    
                    <input type="submit" value="Login" class="btn btn-large">
                    
                  </form>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="mobile-nav">
    <li>
      <a href="#home">Home</a>
    </li>
    <li>
      <a href="#Recherche">Recherche</a>
    </li>
    <li>
      <a href="#popular">Destinations populaires</a>
    </li>
    <li>
      <a href="#gallery">Gallery</a>
    </li>
    <li>
      <a href="#contact">Contact</a>
    </li>
  </ul>

  <!-- Section: Slider -->
  <section class="slider">
    <ul class="slides">
      <li>
        <img src="img/architecture-big-ben-bridge-buildings-262413.jpg" alt="">
        <!-- random image -->
        <div class="caption center-align">
          <h2>Prenez vos vacances de rêve</h2>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, provident eos dicta unde debitis</h5>
        </div>
      </li>
      <li>
        <img src="img/photo-of-a-building-1553309.jpg" alt="">
        <!-- random image -->
        <div class="caption left-align">
          <h2>Nous travaillons avec tous les budgets</h2>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus delectus inventore neque impedit</h5>
        </div>
      </li>
      <li>
        <img src="img/saint-basil-s-cathedral-753339.jpg" alt ="">
        <!-- random image -->
        <div class="caption right-align">
          <h2>Escapades en groupe et individuelles</h2>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ipsum molestias excepturi doloremque</h5>
        </div>
      </li>
    </ul>
  </section>

  <!-- Section: Recherche -->
  <section id="Recherche" class="section section-Recherche blue darken-1 white-text center scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h3>Recherche Destinations</h3>
          <div class="input-field">
          <input type="text" id="country_id2" onkeyup="autocomplet2()" placeholder="Allemagne, Angleterre, France, Italie, etc..">
                    <ul id="country_list_id2"></ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Icon Boxes -->
  <section class="section section-icons grey lighten-4 center">
    <div class="container">
      <div class="row">
        <div class="col s12 m4">
          <div class="card-panel">
            <i class="material-icons large blue-text">room</i>
            <h4>Pick Where</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, tempore?</p>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card-panel">
            <i class="material-icons large blue-text">store</i>
            <h4>Travel Shop</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, tempore?</p>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card-panel">
            <i class="material-icons large blue-text">airplanemode_active</i>
            <h4>Fly Cheap</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, tempore?</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Destinations populaires -->
  <section id="popular" class="section section-popular scrollspy">
    <div class="container">
      <div class="row">
        <h4 class="center">
          <span class="blue-text">Popular</span> Places</h4>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src=voyageExpress/img/architecture-big-ben-bridge-buildings-262413.jpg" alt="">
              <span class="card-title">London</span>
            </div>
            <div class="card-content">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum ea deserunt officia, dicta sint perferendis.
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="voyageExpress/img/photo-of-a-building-1553309.jpg" alt="">
              <span class="card-title">Belgique</span>
            </div>
            <div class="card-content">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum ea deserunt officia, dicta sint perferendis.
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="voyageExpress/img/saint-basil-s-cathedral-753339.jpg" alt="">
              <span class="card-title">Moscou</span>
            </div>
            <div class="card-content">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum ea deserunt officia, dicta sint perferendis.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Follow -->
  <section class="section section-follow blue darken-2 white-text center">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h4>Follow VoyageExpress</h4>
          <p>Follow us on social media for special offers</p>
          <a href="#" class="white-text">
            <i class="fab fa-facebook fa-4x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-twitter fa-4x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-linkedin fa-4x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-google-plus fa-4x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-pinterest fa-4x"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Gallery -->
  <section id="gallery" class="section section-gallery scrollspy">
    <div class="container">
      <h4 class="center">
        <span class="blue-text">Photo</span> Gallery
      </h4>
      <div class="row">
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?beach" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?travel" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?nature" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?beach,travel" alt="" class="materialboxed responsive-img">
        </div>
      </div>

      <div class="row">
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?water" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?building" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?trees" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?cruise" alt="" class="materialboxed responsive-img">
        </div>
      </div>

      <div class="row">
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?beaches" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?traveling" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?bridge" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?beach,travel,boat" alt="" class="materialboxed responsive-img">
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Contact -->
  <section id="contact" class="section section-contact scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12 m6">
          <div class="card-panel blue white-text center">
            <i class="material-icons">email</i>
            <h5>Contactez-nous pour réserver</h5>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo praesentium fugit tempore hic enim possimus molestias
              quisquam impedit corrupti eveniet.</p>
          </div>
          <ul class="collection with-header">
            <li class="collection-header">
              <h4>Destinations</h4>
            </li>
            <li class="collection-item">VoyageExpress</li>
            <li class="collection-item">Universite de Cergy-Pontoise</li>
            <li class="collection-item">Cergy-Pontoise,France</li>
          </ul>
        </div>
        <div class="col s12 m6">
          <div class="card-panel grey lighten-3">
            <h5>Please fill out this form</h5>
            <div class="input-field">
              <input type="text" placeholder="Name">
            </div>
            <div class="input-field">
              <input type="text" placeholder="Email">
            </div>
            <div class="input-field">
              <input type="text" placeholder="Phone">
            </div>
            <div class="input-field">
              <textarea class="materialize-textarea" placeholder="Enter Message"></textarea>
            </div>
            <input type="submit" value="Submit" class="btn">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="section blue darken-2 white-text center">
    <p class="flow-text">VoyageExpress &copy; 2019 </p>
  </footer>

  <!--JavaScript at end of body for optimized loading-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

  <script>
    //popup login form
    $(document).ready(function(){
  		$('.modal').modal();
 });
 //Select
 $(document).ready(function(){
    $('select').formSelect();
  });
    // Sidenav
    const sideNav = document.querySelector('.sidenav');
    M.Sidenav.init(sideNav, {});

    // Slider
    const slider = document.querySelector('.slider');
    M.Slider.init(slider, {
      indicators: false,
      height: 500,
      transition: 500,
      interval: 6000
    });

    // Autocomplete
    const ac = document.querySelector('.autocomplete');
    M.Autocomplete.init(ac, {
      data: {
        "Paris": null,
        "Rome": null,
        "Prague": null,
        "Florida": null,
        "California": null,
        "Jamacia": null,
        "Europe": null,
      }
    });

    // Material Boxed
    const mb = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(mb, {});

    // ScrollSpy
    const ss = document.querySelectorAll('.scrollspy');
    M.ScrollSpy.init(ss, {});

  </script>
</body>

</html>