<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    
    <title>HICS SYSTEM</title>

    <!-- Meta Tags -->
    
    <meta charset="utf-8">
    <meta name="description" content="Hospital Information Collection System">
    <meta name="author" content="Sachin Kekarjawalekar">
    <meta name="theme-color" content="#FF0000" />

      <!-- Opengraph Meta Tags -->
      <meta property="og:type" content="website"/>
      <meta property="og:title" content="HICS SYSTEM"/>
      <meta property="og:description" content="Hospital Information Collection System"/>
      <meta property="og:image" content="assets/logo/ndma.png"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="assets/materialize/css/materialize.min.css"
            media="screen,projection"/>

      <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/theme.css">

  </head>

  <body>

  <nav class="red lighten-1" role="navigation">
      <div class="nav-wrapper padding-horizontal"><a id="logo-container" href="./" class="brand-logo">HICS <span
                  class="hide-on-small-and-down">SYSTEM</span></a>
          <?php if(isset($_SESSION["user_type"])): ?>
          <ul class="right hide-on-med-and-down">
              <li><a class="font-nav-bar" href="./logout">Logout</a></li>
          </ul>
          <?php endif; ?>
          <ul class="right hide-on-med-and-down">
              <li><a class="font-nav-bar" href="./admin">Admin Login</a></li>
          </ul>

          <ul class="right hide-on-med-and-down">
              <li><a class="font-nav-bar" href="./hospital">Hospital's Login</a></li>
          </ul>

          <ul class="right hide-on-med-and-down">
              <li><a class="font-nav-bar" href="./register.php">Hospital's Registration</a></li>
          </ul>
          <ul class="right hide-on-med-and-down">
              <li><a class="font-nav-bar" href="./">Homepage</a></li>
          </ul>

          <ul id="nav-mobile" class="sidenav">
              <li class="padding-horizontal"><img src="./assets/logo/hics.png" alt="hics" width="200px"></li>
              <br/>
              <li><a class="font-nav-bar" href="./">Homepage</a></li>
              <li><a class="font-nav-bar" href="./admin">Admin Login</a></li>
              <li><a class="font-nav-bar" href="./register.php">Hospital's Registration</a></li>
              <li><a class="font-nav-bar" href="./hospital">Hospital's Login</a></li>
              <?php if(isset($_SESSION["user_type"])): ?>
            <li><a class="font-nav-bar" href="./logout">Logout</a></li>
          <?php endif; ?>
        </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container center">
        <br><br>
        <img src="./assets/logo/hics.png" class="responsive-img" alt="HICS Logo">
        <div class="row center">
            <h4 class="header col s12 light">Hospital Information Collection System</h4>
            <hr/>
            <div class="col s12 light">
                <h6>परभणी जिल्ह्यातील सर्व हॉस्पिटलची माहिती आणि त्यांच्या दैनंदिन अहावालासाठीची प्रणाली.</h6>
            </div>
            <div class="col s12">
                <br/>
            </div>
            <div class="col s12 l4 m12 center">
                <h5 class="center"><a href="./hospital">Hospital's Login</a></h5>
            </div>
            <div class="col s12 l4 m12 center">
                <h5 class="center"><a href="./register.php">Hospital's Registration</a></h5>
            </div>
            <div class="col s12 l4 m12 center">
                <h5 class="center"><a href="./admin">Admin Login</a></h5>
            </div>

        </div>
        <br><br>

    </div>
  </div>


  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h6 class="white-text center text-padding">निर्मिती : जिल्हा आपत्ती व्यवस्थापन प्राधिकरण परभणी, जिल्हाधिकारी कार्यालय, परभणी</h6>
        </div>

        <div class="col s12 center">
          <img align="center" src="assets/logo/ndma.png"  class="m-2" width="80px">
              <img align="center" src="assets/logo/india-emblem.png" alt="India Emblem" class="m-2" width="80px">
              <img align="center" src="assets/logo/gom.png" class="m-2" alt="Goverment of Maharashtra" width="80px">
              <img align="center" src="assets/logo/nic-transparent.png" class="m-2" alt="NIC" width="100px">
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container center">
      Made by <a class="orange-text text-lighten-3" href="javascript:void(0)">NIC Parbhani</a>
      </div>
    </div>
  </footer>


  <!--JavaScript at end of body for optimized loading-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>

    <script type="text/javascript" src="assets/js/theme.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>

  </body>
</html>
