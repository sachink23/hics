<!DOCTYPE html>
<html>
<head>

    <title>Doctor Registration</title>

    <!-- Meta Tags -->

    <meta charset="utf-8">
    <meta name="description" content="जिल्हा आपत्ती व्यवस्थापन प्राधिकरण जिल्हाधिकारी कार्यालय परभणी">
    <meta name="author" content="Sachin Kekarjawalekar">
    <meta name="theme-color" content="#FF0000" />
    <!-- Opengraph Meta Tags -->
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="HICS SYSTEM"/>
    <meta property="og:description" content="जिल्हा आपत्ती व्यवस्थापन प्राधिकरण जिल्हाधिकारी कार्यालय परभणी"/>
    <meta property="og:image" content="./assets/logo/ndma.png"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/materialize/css/materialize.min.css"  media="screen,projection"/>

    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/theme.css">

</head>

<body>

<nav class="red lighten-1" role="navigation">
    <div class="nav-wrapper padding-horizontal"><a id="logo-container" href="./" class="brand-logo">HICS SYSTEM</a>

        <ul class="right hide-on-med-and-down">
            <li><a class="font-nav-bar" href="./admin">Admin Login</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><a class="font-nav-bar" href="./register.php">Doctor Registration</a></li>
        </ul>

        <ul class="right hide-on-med-and-down">
            <li><a class="font-nav-bar" href="./hospital">Doctor Login</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><a class="font-nav-bar" href="./">Homepage</a></li>
        </ul>

        <ul id="nav-mobile" class="sidenav">
            <li class="padding-horizontal padding-vertical"><img src="./assets/logo/ndma.png" alt="NDMA" width="100px"></li>
            <li><a class="font-nav-bar" href="./">Homepage</a></li>
            <li><a class="font-nav-bar" href="./admin">Admin Login</a></li>
            <li><a class="font-nav-bar" href="./hospital">Doctor Login</a></li>
            <li><a class="font-nav-bar" href="./register.php">Doctor Registration</a></li>

        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
    <div class="container center z-depth-4" style="border: 1px solid #000; margin-bottom: 20px; margin-top: 20px">
        <h5 class="center lobster-cursive">Doctor/Hospital Registration</h5><hr />
        <form action="javascript:void(0)" id="doctor_reg_form" onsubmit="registerFormSubmit()" onreset="registerFormReset()" class="row padding-horizontal">
            <div class="col s12 m8">
                <div class="input-field">
                    <input type="text" minlength="5" maxlength="256"
                           name="hosp_name" id="hosp_name" required class="validate" placeholder="Hospital Name">
                    <label for="hosp_name">Name of Hospital</label>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="input-field">
                    <select name="type_of_hosp" onchange="hospChanged(this.value)" id="type_of_hosp" class="validate">
                        <option value="">Select Type</option>
                        <option value="ayurvedic">Ayurvedic</option>
                        <option value="allopathy">Allopathy</option>
                        <option value="homoeopathy">Homoeopathy</option>
                        <option value="unani">Unani</option>
                        <option value="other">Other</option>
                    </select>
                    <label for="type_of_hosp">Type of Hospital</label>
                </div>
                <div class="input-field" id="spec_other_type">
                    <input type="text" minlength="3" placeholder="Specify Hospital Type" maxlength="64" name="other_type" id="other_type" class="validate">
                    <label for="other_type">Specify Hospital Type</label>
                </div>
            </div>

            <div class="col s12 m8">
                <div class="input-field">
                    <input type="text" name="doctor_name" minlength="5" maxlength="256"
                           placeholder="Name of Doctor" id="doctor_name" required class="validate">
                    <label for="doctor_name">Name of Doctor</label>

                </div>
            </div>
            <div class="col s12 m4">
                <div class="input-field">
                    <input type="number" name="mobile" placeholder="Doctors Mobile" id="mobile" min="6000000000" max="9999999999" class="validate" required>
                    <label for="mobile">Mobile Number</label>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="input-field">
                    <select name="subdist" id="subdist" class="validate">
                        <option value="">Select Taluka</option>
                        <option value="Parbhani (City)">Parbhani (City)</option>
                        <option value="Parbhani">Parbhani</option>
                        <option value="Jintur">Jintur</option>
                        <option value="Pathri">Pathri</option>
                        <option value="Manwath">Manwath</option>
                        <option value="Purna">Purna</option>
                        <option value="Selu">Selu</option>
                        <option value="Sonpeth">Sonpeth</option>
                        <option value="Palam">Palam</option>
                        <option value="Gangakhed">Gangakhed</option>
                    </select>
                    <label for="subdist">Taluka</label>
                </div>
            </div>
            <div class="col s12 m8">
                <div class="input-field">
                    <textarea minlength="5" maxlength="512" name="address" id="address" required class="validate materialize-textarea" placeholder="Detailed Address of Hospital"></textarea>
                    <label for="address">Hospital Address</label>
                </div>
            </div>
            <div class="col s12">
                <button type="submit" style="margin: 3px" class="btn waves-effect indigo right">Register</button>
                <button type="reset" style="margin: 3px" class="btn waves-effect red right">Reset Form</button>

            </div>
        </form>
    </div>

<footer class="page-footer orange">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h6 class="white-text center text-padding">निर्मिती : जिल्हा आपत्ती व्यवस्थापन प्राधिकरण परभणी, जिल्हाधिकारी कार्यालय, परभणी</h6>
            </div>

            <div class="col s12 center">
                <img align="center" src="assets/logo/ndma.png" alt="NDMA" class="m-2" width="80px">
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