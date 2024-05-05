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

/*if (isset($_GET['cartid'])&&isset($_POST['submit3'])) {
  $cid = intval($_POST['cartid']);
  $customeremail = $_SESSION['login'];
  $sql = "DELETE FROM `cart` WHERE `CartId`=:cid AND `CustomerEmail`=:customeremail";
  $query = $dbh->prepare($sql);
  $query->bindParam(':cid', $cid, PDO::PARAM_STR);
  $query->bindParam(':customeremail', $customeremail, PDO::PARAM_STR);
  $query->execute();
}*/

if (isset($_POST['submit3'])) {
  $customeremail = $_SESSION['login'];
  $cid = intval($_POST['cartid']);
  $customername = $_POST['customername'];
  $customeraddress = $_POST['customeraddress'];
  $productname = $_POST['productname'];
  $productprice = $_POST['productprice'];
  $productquantity = $_POST['productquantity'];
  $totalprice = $_POST['totalprice'];
  $selleremail = $_POST['selleremail'];
  $status = 0;
  $sql = "INSERT INTO `order`(`CustomerEmail`, `CustomerName`, `CustomerAddress`, `ProductName`, `ProductPrice`, `ProductQuantity`, `TotalPrice`, `SellerEmail`, `Status`)
          VALUES (:customeremail,:customername,:customeraddress,:productname,:productprice,:productquantity,:totalprice,:selleremail,:status);
          DELETE FROM `cart` WHERE `CartId`=:cid AND `CustomerEmail`=:customeremail";
  $query = $dbh->prepare($sql);
  $query->bindParam(':cid', $cid, PDO::PARAM_STR);
  $query->bindParam(':customeremail', $customeremail, PDO::PARAM_STR);
  $query->bindParam(':customername', $customername, PDO::PARAM_STR);
  $query->bindParam(':customeraddress', $customeraddress, PDO::PARAM_STR);
  $query->bindParam(':productname', $productname, PDO::PARAM_STR);
  $query->bindParam(':productprice', $productprice, PDO::PARAM_STR);
  $query->bindParam(':productquantity', $productquantity, PDO::PARAM_STR);
  $query->bindParam(':totalprice', $totalprice, PDO::PARAM_STR);
  $query->bindParam(':selleremail', $selleremail, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
      echo "<script>alert('Order Successfully Placed');</script>";
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
    <?php include('includes/header.php'); ?>

    <!-- Page Wrapper -->
    <section class="page-wrapper success-msg">
    <div class="container">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="block text-center">
                <i class="tf-ion-android-checkmark-circle"></i>
            <h2 class="text-center">Thank you! For your payment</h2>
            <p class="text-center">Order is Successfully Placed</p>
            <a href="shop.php" class="btn btn-main mt-20">Continue Shopping</a>
            </div>
        </div>
        </div>
    </div>
    </section><!-- /.page-warpper -->

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