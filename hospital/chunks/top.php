<?php

require_once "../include.php";

$hosp = new department();

if(!$hosp->loggedIn()) {
    pageInfo("red", "Login First!");
    header("Location: ./");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<!--================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 4.0
  Author: PIXINVENT
  Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================ -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Materialize - Material Design Admin Template</title>
    <!-- Favicons-->
    <link rel="icon" href="../assets/theme/images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="../assets/theme/images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="../assets/theme/images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="../assets/theme/css/materialize.css" type="text/css" rel="stylesheet">
    <link href="../assets/theme/css/style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="../assets/theme/css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="../assets/theme/vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="../assets/theme/vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
</head>
<body>
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-light-blue-cyan">
            <div class="nav-wrapper">
                <ul class="left">
                    <li>
                        <h1 class="logo-wrapper">
                            <a href="./" class="brand-logo darken-1">
                                <img src="../assets/logo/ndma.png" align="center" alt="Logo">
                                <span class="logo-text hide-on-med-and-down">Admin Dashboard</span>
                            </a>
                        </h1>
                    </li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                            <i class="material-icons">settings_overscan</i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                          <span class="avatar-status avatar-online">
                            <img src="../assets/theme/images/avatar/avatar-10.png" alt="avatar">
                            <i></i>
                          </span>
                        </a>
                    </li>
                </ul>
                <!-- profile-dropdown -->
                <ul id="profile-dropdown" class="dropdown-content">
                    <li>
                        <a href="#" class="grey-text text-darken-1">
                            <i class="material-icons">face</i> Profile</a>
                    </li>
                    <li>
                        <a href="#" class="grey-text text-darken-1">
                            <i class="material-icons">settings</i> Settings</a>
                    </li>
                    <li>
                        <a href="#" class="grey-text text-darken-1">
                            <i class="material-icons">live_help</i> Help</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" class="grey-text text-darken-1">
                            <i class="material-icons">lock_outline</i> Lock</a>
                    </li>
                    <li>
                        <a href="#" class="grey-text text-darken-1">
                            <i class="material-icons">keyboard_tab</i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>
<!-- END HEADER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
            <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-2">
                    <div class="row">
                        <div class="col col s4 m4 l4">
                            <img src="../assets/theme/images/avatar/avatar-10.png" alt="" class="circle responsive-img valign profile-image cyan">
                        </div>
                        <div class="col col s8 m8 l8">
                            <ul id="profile-dropdown-nav" class="dropdown-content">
                                <li>
                                    <a href="#" class="grey-text text-darken-1">
                                        <i class="material-icons">face</i> Profile</a>
                                </li>
                                <li>
                                    <a href="#" class="grey-text text-darken-1">
                                        <i class="material-icons">settings</i> Settings</a>
                                </li>
                                <li>
                                    <a href="#" class="grey-text text-darken-1">
                                        <i class="material-icons">live_help</i> Help</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" class="grey-text text-darken-1">
                                        <i class="material-icons">lock_outline</i> Lock</a>
                                </li>
                                <li>
                                    <a href="#" class="grey-text text-darken-1">
                                        <i class="material-icons">keyboard_tab</i> Logout</a>
                                </li>
                            </ul>
                            <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav">John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <p class="user-roal">Doctor</p>
                        </div>
                    </div>
                </li>
                <li class="no-padding">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li class="bold">
                            <a href="index.html" class="waves-effect waves-cyan">
                                <i class="material-icons">pie_chart_outlined</i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="cards-basic.html" class="waves-effect waves-cyan">
                                <i class="material-icons">cast</i>
                                <span class="nav-text">Cards</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="ui-basic-buttons.html" class="waves-effect waves-cyan">
                                <i class="material-icons">insert_link</i>
                                <span class="nav-text">Buttons</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="form-layouts.html" class="waves-effect waves-cyan">
                                <i class="material-icons">format_color_text</i>
                                <span class="nav-text">Forms</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="css-typography.html" class="waves-effect waves-cyan">
                                <i class="material-icons">format_size</i>
                                <span class="nav-text">Typography</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="css-color.html" class="waves-effect waves-cyan">
                                <i class="material-icons">invert_colors</i>
                                <span class="nav-text">Color</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="table-basic.html" class="waves-effect waves-cyan">
                                <i class="material-icons">border_all</i>
                                <span class="nav-text">Table</span>
                            </a>
                        </li>
                        <li class="bold">
                            <a href="ui-icons.html" class="waves-effect waves-cyan">
                                <i class="material-icons">lightbulb_outline</i>
                                <span class="nav-text">Icons</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
                <i class="material-icons">menu</i>
            </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
            <!--start container-->
            <div class="container">