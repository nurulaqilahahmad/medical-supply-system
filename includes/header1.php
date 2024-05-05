<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Medical Supply System</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

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

  <?php if ($_SESSION['login']) { ?>

    <!-- Start Top Header Bar -->
    <section class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-12 col-sm-4">
            <div class="email">
              <ul class="tp-hd-rgt wow fadeInleft animated" data-wow-delay=".5s">
                <!--<li class="tol">Welcome :</li>-->
                <li class="sig"><?php echo htmlentities($_SESSION['login']); ?></li>
              </ul>
              <div class="clearfix"></div>
            </div>
          </div>

          <div class="col-md-4 col-xs-12 col-sm-4">
            <!-- Site Logo -->
            <div class="logo text-center">
              <a href="index.html">
                <!-- replace logo here -->
                <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40" font-family="AustinBold, Austin" font-weight="bold">
                    <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                      <text id="AVIATO">
                        <tspan x="108.94" y="325">M.S.S</tspan>
                      </text>
                    </g>
                  </g>
                </svg>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-xs-12 col-sm-4">
            <!-- Cart -->
            <ul class="top-menu text-right list-inline">
              <!-- Search -->
              <li class="dropdown search dropdown-slide">
                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-ios-search-strong"></i> Search</a>
                <ul class="dropdown-menu search-dropdown">
                  <li>
                    <form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
                  </li>
                </ul>
              </li><!-- / Search -->

              <!-- Logout -->
              <li class="logout"><a href="seller_logout.php">Logout</a></li><!-- Logout -->
            </ul><!-- / .nav .navbar-nav .navbar-right -->
          </div>
        </div>
      </div>
    </section><!-- End Top Header Bar -->

    <!-- Main Menu Section -->
    <section class="menu">
      <nav class="navbar navigation">
        <div class="container">
          <div class="navbar-header">
            <h2 class="menu-title">Main Menu</h2>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

          </div><!-- / .navbar-header -->

          <!-- Navbar Links -->
          <div id="navbar" class="navbar-collapse collapse text-center">
            <ul class="nav navbar-nav">

              <!-- Home -->
              <li class="dropdown ">
                <a href="main2.php">Home</a>
              </li><!-- / Home -->

              <!-- Pages -->
              <li class="dropdown full-width dropdown-slide">
                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="tf-ion-ios-arrow-down"></span></a>
                <div class="dropdown-menu">
                  <div class="row">

                    <!-- contact -->
                    <div class="col-sm-5 col-xs-12">
                      <ul>
                        <li class="dropdown-header">Dashboard</li>
                        <li role="separator" class="divider"></li>
                        <li><a href="seller_viewpurchase.php">Orders</a></li>
                        <li><a href="manage_product.php">Product</a></li>
                        <li><a href="seller_profiledetails.php">Profile Details</a></li>
                      </ul>
                    </div>

                    <!-- Utility -->
                    <div class="col-sm-4 col-xs-12">
                      <ul>
                        <li class="dropdown-header">Utility</li>
                        <li role="separator" class="divider"></li>
                        <li><a href="customer_login.php">Customer Page</a></li>
                        <li><a href="seller_login.php">Seller Page</a></li>
                        <!--<li><a href="loginAdmin.php">Admin Page</a></li>-->
                      </ul>
                    </div>

                    <!-- Mega Menu -->
                    <div class="col-sm-3 col-xs-12">
                      <a href="shop.html">
                        <img class="img-responsive" src="images/shop/medicalsymbol.png" alt="menu image" />
                      </a>
                    </div>
                  </div><!-- / .row -->
                </div><!-- / .dropdown-menu -->
              </li><!-- / Pages -->
            </ul><!-- / .nav .navbar-nav -->
          </div>
          <!--/.navbar-collapse -->
        </div><!-- / .container -->
      </nav>
    </section><?php } else { ?>


    <!-- Start Top Header Bar -->
    <section class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-12 col-sm-4">
            <div class="contact-number">
              <a href="admin/theme/admin_login.php">
                <h5>Admin</h5>
              </a>
              <!--<i class="tf-ion-ios-telephone"></i>
					<span>0129- 12323-123123</span>-->
            </div>
          </div>
          <div class="col-md-4 col-xs-12 col-sm-4">
            <!-- Site Logo -->
            <div class="logo text-center">
              <a href="main.php">
                <!-- replace logo here -->
                <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40" font-family="AustinBold, Austin" font-weight="bold">
                    <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                      <text id="AVIATO">
                        <tspan x="108.94" y="325">M.S.S</tspan>
                      </text>
                    </g>
                  </g>
                </svg>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-xs-12 col-sm-4">
            <!-- Cart -->
            <ul class="top-menu text-right list-inline">
              <!-- Search -->
              <li class="dropdown search dropdown-slide">
                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-ios-search-strong"></i> Search</a>
                <ul class="dropdown-menu search-dropdown">
                  <li>
                    <form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
                  </li>
                </ul>
              </li><!-- / Search -->
            </ul><!-- / .nav .navbar-nav .navbar-right -->
          </div>
        </div>
      </div>
    </section><!-- End Top Header Bar -->

    <!-- Main Menu Section -->
    <section class="menu">
      <nav class="navbar navigation">
        <div class="container">
          <div class="navbar-header">
            <h2 class="menu-title">Main Menu</h2>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

          </div><!-- / .navbar-header -->

          <!-- Navbar Links -->
          <div id="navbar" class="navbar-collapse collapse text-center">
            <ul class="nav navbar-nav">

              <!-- Home -->
              <li class="dropdown ">
                <a href="main.php">Home</a>
              </li><!-- / Home -->

              <!-- Pages -->
              <li class="dropdown full-width dropdown-slide">
                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="tf-ion-ios-arrow-down"></span></a>
                <div class="dropdown-menu">
                  <div class="row">

                    <!-- Introduction -->
                    <div class="col-sm-3 col-xs-12">
                      <ul>
                        <li class="dropdown-header">Introduction</li>
                        <li role="separator" class="divider"></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="coming_soon.php">Coming Soon</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                      </ul>
                    </div>

                    <!-- contact -->
                    <div class="col-sm-3 col-xs-12">
                      <ul>
                        <li class="dropdown-header">Dashboard</li>
                        <li role="separator" class="divider"></li>
                        <li><a href="seller_login.php">Orders</a></li>
                        <li><a href="seller_login.php">Product</a></li>
                        <li><a href="seller_login.php">Profile Details</a></li>
                      </ul>
                    </div>

                    <!-- Utility -->
                    <div class="col-sm-3 col-xs-12">
                      <ul>
                        <li class="dropdown-header">Utility</li>
                        <li role="separator" class="divider"></li>
                        <li><a href="customer_login.php">Customer Page</a></li>
                        <li><a href="seller_login.php">Seller Page</a></li>
                        <!--<li><a href="loginAdmin.php">Admin Page</a></li>-->
                      </ul>
                    </div>

                    <!-- Mega Menu -->
                    <div class="col-sm-3 col-xs-12">
                      <a href="shop.html">
                        <img class="img-responsive" src="images/shop/medicalsymbol.png" alt="menu image" />
                      </a>
                    </div>
                  </div><!-- / .row -->
                </div><!-- / .dropdown-menu -->
              </li><!-- / Pages -->
            </ul><!-- / .nav .navbar-nav -->
          </div>
          <!--/.navbar-collapse -->
        </div><!-- / .container -->
      </nav>
    </section>
  <?php } ?>

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