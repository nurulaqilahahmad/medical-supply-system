<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>About Us | Medical Supply Shop</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.jpeg" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">

    <!-- Animate css -->
    <link rel="stylesheet" href="plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

    <!-- Start Top Header Bar -->
    <?php include('includes/header.php'); ?>

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">About Us</h1>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">about us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-responsive" src="images/about/building.jpg">
                </div>
                <div class="col-md-6">
                    <h2 class="mt-40">About Our Shop</h2>
                    <p>Launched in 2021, it is a platform tailored for the region, providing customers with an easy, secure and fast online shopping experience through strong payment and fulfillment support.</p>
                    <p>We believe online shopping should be accessible, easy and enjoyable. This is the vision Medical Supply Shop aspires to deliver on the platform, every single day.</p>
                    <p>We believe in the transformative power of technology and want to change the world for the better by providing a platform to connect buyers and sellers within one community.</p>
                    <a href="main.php" class="btn btn-main mt-20">Main Page</a>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-md-3 text-center">
                    <img src="images/about/awards-logo.png">
                </div>
                <div class="col-md-3 text-center">
                    <img src="images/about/awards-logo.png">
                </div>
                <div class="col-md-3 text-center">
                    <img src="images/about/awards-logo.png">
                </div>
                <div class="col-md-3 text-center">
                    <img src="images/about/awards-logo.png">
                </div>
            </div>
        </div>
    </section>
    <section class="team-members ">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h2>Team Members</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="images/team/Asyiqin.jpeg">
                        <h4>Nursyahidatul Asyiqin</h4>
                        <p>Founder</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="images/team/Aqilah.jpeg">
                        <h4>Nurul Aqilah</h4>
                        <p>Developer</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="images/team/Syamira.jpeg">
                        <h4>Nurul Syamira</h4>
                        <p>Shop Manager</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="images/team/Arinie.jpeg">
                        <h4>Noor Arinie</h4>
                        <p>Sales Marketing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Below Footer Bar-->
  <?php include('includes/footer.php'); ?>

    <!-- 
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>



</body>

</html>