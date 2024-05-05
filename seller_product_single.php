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

if (isset($_POST['submit2'])) {
  $pid = intval($_GET['productid']);
  $customeremail = $_SESSION['login'];
  $productname = $_POST['productname'];
  $productdetails = $_POST['productdetails'];
  $productprice = $_POST['productprice'];
  $productimage = $_POST['productimage'];
  $productcategory = $_POST['productcategory'];
  $productquantity = $_POST['product-quantity'];
  $productlocation = $_POST['productLocation'];
  $selleremail = $_POST['selleremail'];
  $action = 0;
  $sql = "INSERT INTO cart(ProductId, CustomerEmail, ProductName, ProductDetails, ProductPrice, ProductImage, ProductCategories, ProductQuantity, productShips, SellerEmail, Action) 
                    VALUES(:pid, :customeremail, :productname, :productdetails, :productprice, :productimage, :productcategory, :productquantity, :productlocation,  :selleremail, :action)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':pid', $pid, PDO::PARAM_STR);
  $query->bindParam(':customeremail', $customeremail, PDO::PARAM_STR);
  $query->bindParam(':productname', $productname, PDO::PARAM_STR);
  $query->bindParam(':productdetails', $productdetails, PDO::PARAM_STR);
  $query->bindParam(':productprice', $productprice, PDO::PARAM_STR);
  $query->bindParam(':productimage', $productimage, PDO::PARAM_STR);
  $query->bindParam(':productcategory', $productcategory, PDO::PARAM_STR);
  $query->bindParam(':productquantity', $productquantity, PDO::PARAM_STR);
  $query->bindParam(':productlocation', $productlocation, PDO::PARAM_STR);
  $query->bindParam(':selleremail', $selleremail, PDO::PARAM_STR);
  $query->bindParam(':action', $action, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo "<script>alert('Product Successfully Added To Cart');</script>";
  } else {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
  }
}
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
  <?php include('includes/header1.php'); ?>

  <!-- Single-Shop Section -->
  <section class="single-product">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <ol class="breadcrumb">
            <li><a href="main2.php">Home</a></li>
            <li><a href="manage_product.php">Product</a></li>
            <li class="active">Single Product</li>
          </ol>
        </div>
      </div>

      <?php
      $pid = intval($_GET['productid']);
      $sql = "SELECT *from products where ProductId=:pid";
      $query = $dbh->prepare($sql);
      $query->bindParam(':pid', $pid, PDO::PARAM_STR);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      $cnt = 1;
      if ($query->rowCount() > 0) {
        foreach ($results as $result) {
      ?>
          <form name="cart" method="post">

            <!-- first Section After Single-Shop Section-->
            <div class="row mt-20">
              <div class="col-md-5">
                <div class="single-product-slider">
                  <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                    <div class='carousel-outer'>

                      <!-- me art lab slider -->
                      <div class='carousel-inner '>
                        <div class='item active'>
                          <img class="img-responsive" src="images/shop/products/<?php echo htmlentities($result->ProductImage); ?>" alt="">
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <!-- products details -->
              <div class="col-md-7">
                <div class="single-product-details">
                  <input class="special" type="hidden" name="productname" value="<?php echo htmlentities($result->ProductName); ?>">
                  <input class="special" type="hidden" name="productdetails" value="<?php echo htmlentities($result->ProductDetails); ?>">
                  <input class="special" type="hidden" name="productprice" value="<?php echo htmlentities($result->ProductPrice); ?>">
                  <input class="special" type="hidden" name="productimage" value="<?php echo htmlentities($result->ProductImage); ?>">
                  <input class="special" type="hidden" name="productcategory" value="<?php echo htmlentities($result->ProductCategories); ?>">
                  <input class="special" type="hidden" name="productlocation" value="<?php echo htmlentities($result->productShips); ?>">
                  <input class="special" type="hidden" name="selleremail" value="<?php echo htmlentities($result->SellerEmail); ?>">

                  <h2 class="product-name"><?php echo htmlentities($result->ProductName); ?></h2>
                  <p class="product-price">MYR <?php echo htmlentities($result->ProductPrice); ?></p>
                  <p class="product-description mt-20" style="text-align: justify;"><?php echo htmlentities($result->ProductDetails); ?></p>
                  <p class="product-stocks">Stocks: <?php echo htmlentities($result->ProductStock); ?></p>
                  <p class="product-quantity">Ships From: <?php echo htmlentities($result->productLocation); ?></p>
                  <p class="product-category">Categories: <?php echo htmlentities($result->ProductCategories); ?></p>
                </div>
              </div>
            </div>

            <!-- Second Section After Single-Shop Section-->
            <div class="row">
              <div class="col-xs-12">
                <div class="tabCommon mt-20">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
                  </ul>

                  <div class="tab-content patternbg">
                    <div id="details" class="tab-pane fade active in">
                      <h4>Product Description</h4>
                      <p style="text-align: justify;"><?php echo htmlentities($result->ProductDetails); ?></p>
                    </div>
                    <div id="reviews" class="tab-pane fade">
                      <div class="post-comments">
                        <ul class="media-list comments-list m-bot-50 clearlist">
                          <!-- Comment Item start-->
                          <li class="media">
                            <a class="pull-left" href="#!">
                              <img class="media-object comment-avatar" src="images/blog/avater-1.jpg" alt="" width="50" height="50" />
                            </a>
                            <div class="media-body">
                              <div class="comment-info">
                                <h4 class="comment-author">
                                  <a href="#!">Jonathon Andrew</a>
                                </h4>
                                <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
                                <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
                              </div>
                            </div>
                          </li>
                          <!-- End Comment Item -->
                        </ul>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </form>
      <?php }
      } ?>
    </div>
  </section>

  <!--Below Single-Shop Section-->
  <section class="products related-products section">
    <div class="container">
      <div class="row">
        <?php
        $sql = "SElECT *from products where";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;

        if ($query->rowCount() > 0) {
          foreach ($results as $result) { ?>
            <form>
              <div class="col-md-3">
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
                      </ul>
                    </div>
                  </div>

                  <div class="product-content">
                    <h4><a href="seller_product_single.php?productid=<?php echo htmlentities($result->ProductId); ?>" class="view"><?php echo htmlentities($result->ProductName); ?></a></h4>
                    <p class="price">MYR <?php echo htmlentities($result->ProductPrice); ?></p>
                  </div>
                </div>
              </div>
            </form>
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
          <form method="post" action="product_single.php">
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
          </form>
        </div>
    <?php }
    } ?>
  </div>

  <footer class="footer section text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="social-media">
            <li>
              <a href="https://www.facebook.com/themefisher">
                <i class="tf-ion-social-facebook"></i>
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/themefisher">
                <i class="tf-ion-social-instagram"></i>
              </a>
            </li>
            <li>
              <a href="https://www.twitter.com/themefisher">
                <i class="tf-ion-social-twitter"></i>
              </a>
            </li>
            <li>
              <a href="https://www.pinterest.com/themefisher/">
                <i class="tf-ion-social-pinterest"></i>
              </a>
            </li>
          </ul>
          <ul class="footer-menu text-uppercase">
            <li>
              <a href="contact.html">CONTACT</a>
            </li>
            <li>
              <a href="shop.php">SHOP</a>
            </li>
            <li>
              <a href="pricing.html">Pricing</a>
            </li>
            <li>
              <a href="contact.html">PRIVACY POLICY</a>
            </li>
          </ul>
          <p class="copyright-text">Copyright &copy;2021, Designed &amp; Developed by <a href="https://themefisher.com/">Astra</a></p>
        </div>
      </div>
    </div>
  </footer>
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