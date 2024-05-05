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

if (isset($_POST['submit4'])) {
  $cid = intval($_POST['cartid']);
  $customeremail = $_SESSION['login'];
  $sql = "DELETE FROM `cart` WHERE `CartId`=:cid AND `CustomerEmail`=:customeremail";
  $query = $dbh->prepare($sql);
  $query->bindParam(':cid', $cid, PDO::PARAM_STR);
  $query->bindParam(':customeremail', $customeremail, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if (!$lastInsertId) {
    echo "<script>alert('Item is Removed');</script>";
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
  <title>Cart | Medical Supply Shop</title>

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

  <!-- Cart Section -->
  <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <h1 class="page-name">Cart</h1>
            <ol class="breadcrumb">
              <li><a href="main.php">Home</a></li>
              <li class="active">cart</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="page-wrapper">
    <div class="cart shopping">
      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <div class="block">
              <div class="product-list">
                <form method="post">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="">Item Name</th>
                        <th class="">Price</th>
                        <th class="">Quantity</th>
                        <th class=""></th>
                        <th class=""></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $customeremail = $_SESSION['login'];
                      $sql = "SELECT *from cart where `CustomerEmail`=:customeremail";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':customeremail', $customeremail, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;

                      if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>
                          <tr class="">
                            <td class="">
                              <div class="product-info">
                                <img width="80" src="images/shop/products/<?php echo htmlentities($result->ProductImage); ?>" alt="product-img" />
                                <a href="#!"><?php echo htmlentities($result->ProductName); ?></a>
                              </div>
                            </td>
                            <td class="price">MYR <?php echo htmlentities($result->ProductPrice); ?></td>
                            <td class="">
                              <a class=""><?php echo htmlentities($result->ProductQuantity); ?></a>
                            </td>
                            <td><a href="checkout.php?cartid=<?php echo htmlentities($result->CartId); ?>" class="btn btn-main pull-right">Checkout</a></td>
                            <input class="special" type="hidden" name="cartid" value="<?php echo htmlentities($result->CartId); ?>">
                            <input class="special" type="hidden" name="customeremail" value="<?php echo htmlentities($result->CustomerEmail); ?>">
                            <td><button type="submit" name="submit4" class="btn btn-main pull-right" style="background-color: darkred" onclick="return confirm('Do you really want to delete ?');">Remove</button></td>
                          </tr>
                      <?php }
                      } ?>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
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