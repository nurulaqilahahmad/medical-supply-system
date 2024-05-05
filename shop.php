<!-- 
THEME: Aviato | E-commerce template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/aviato-e-commerce-template/
DEMO: https://demo.themefisher.com/aviato/
GITHUB: https://github.com/themefisher/Aviato-E-Commerce-Template/

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->

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
  <title>Medical Supply System</title>

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

  <!-- Shop Section -->
  <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <h1 class="page-name">Shop</h1>
            <ol class="breadcrumb">
              <li><a href="main.php">Home</a></li>
              <li class="active">shop</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Product Section -->
  <section class="products section">
    <div class="container">
      <div class="row">
        <?php
        $sql = "SElECT *from products";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;

        if ($query->rowCount() > 0) {
          foreach ($results as $result) { ?>
            <div class="col-md-4">
              <div class="product-item">
                <div class="product-thumb">
                  <!--<span class="bage">Sale</span>-->
                  <!--<img class="img-responsive" src="images/shop/products/product-1.jpg" alt="product-img" />-->
                  <img class="img-responsive" src="images/shop/products/<?php echo htmlentities($result->ProductImage); ?>" alt="product-img" />
                  <div class="preview-meta">
                    <ul>
                      <li>
                        <span data-toggle="modal" data-target="#product-modal">
                          <i class="tf-ion-ios-search-strong"></i>
                        </span>
                      </li>
                      <li>
                        <a href="product_single.php?productid=<?php echo htmlentities($result->ProductId); ?>"><i class="tf-ion-android-cart"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="product-content">
                  <h4><a href="product_single.php?productid=<?php echo htmlentities($result->ProductId); ?>" class="view"><?php echo htmlentities($result->ProductName); ?></a></h4>
                  <p class="price">MYR <?php echo htmlentities($result->ProductPrice); ?></p>
                </div>
              </div>
            </div>
        <?php }
        } ?>
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal product-modal fade" id="product-modal">
    <?php
    $sql = "SElECT *from products";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;

    if ($query->rowCount() > 0) {
      foreach ($results as $result) { ?>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="tf-ion-close"></i>
        </button>
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="modal-image">
                    <img class="img-responsive" src="images/shop/products/<?php echo htmlentities($result->ProductImage); ?>" alt="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="product-short-details">
                    <h2 class="product-title"><?php echo htmlentities($result->ProductName); ?></h2>
                    <p class="product-price">MYR <?php echo htmlentities($result->ProductPrice); ?></p>
                    <p class="product-short-description"><?php echo htmlentities($result->ProductShortDetails); ?></p>
                    <a href="product_single.php?productid=<?php echo htmlentities($result->ProductId); ?>" class="btn btn-transparent">View Product Details</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php }
    } ?>
  </div>

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