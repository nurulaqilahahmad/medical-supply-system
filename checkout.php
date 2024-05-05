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
    <title>Checkout | Medical Supply Shop</title>

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
    <form class="checkout-form" action="confirmation.php" method="post">
    <section class="page-header">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="content">
                <h1 class="page-name">Checkout</h1>
                <ol class="breadcrumb">
                <li><a href="main.php">Home</a></li>
                <li class="active">checkout</li>
                </ol>
            </div>
            </div>
        </div>
        </div>
    </section>

    <?php
    $customeremail = $_SESSION['login'];
    $cid = intval($_GET['cartid']);
    $sql = "SELECT * FROM `cart` WHERE `CustomerEmail`=:customeremail AND `CartId`=:cid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':customeremail', $customeremail, PDO::PARAM_STR);
    $query->bindParam(':cid', $cid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    $totalprice = 0;

    if ($query->rowCount() > 0) {
        foreach ($results as $result) { ?>

    <!--Shipping Details-->
    <form class="checkout-form" action="confirmation.php" method="post">
    <div class="page-wrapper">
    <div class="checkout shopping">
        <div class="container">
            <div class="row">
            <div class="col-md-4">
            <!--<form class="checkout-form" action="confirmation.php" method="post">-->
                    <div class="product-checkout-details">
                        <div class="block">
                            <h4 class="widget-title">Order Summary</h4>
                            <!--<form class="checkout-form" action="confirmation.php" method="post">-->
                            <div class="media product-card">
                            
                                <a class="pull-left" href="product_single.php">
                                <img class="media-object" width="80" src="images/shop/products/<?php echo htmlentities($result->ProductImage); ?>" alt="product-img" />
                                </a>
                                <input class="special" type="hidden" name="cartid" value="<?php echo htmlentities($result->CartId); ?>">
                                <input class="special" type="hidden" name="customeremail" value="<?php echo htmlentities($result->CustomerEmail); ?>">
                                <input class="special" type="hidden" name="productname" value="<?php echo htmlentities($result->ProductName); ?>">
                                <input class="special" type="hidden" name="productprice" value="<?php echo htmlentities($result->ProductPrice); ?>">
                                <input class="special" type="hidden" name="productquantity" value="<?php echo htmlentities($result->ProductQuantity); ?>">
                                <input class="special" type="hidden" name="selleremail" value="<?php echo htmlentities($result->SellerEmail); ?>">
                                <div class="media-body">
                                <h4 class="media-heading"><a href="product_single.php"><?php echo htmlentities($result->ProductName); ?></a></h4>                                
                                <p class="price">MYR <?php echo htmlentities($result->ProductPrice); ?> X <?php echo htmlentities($result->ProductQuantity); ?></p>
                                <?php $totalprice = $totalprice + (htmlentities($result->ProductPrice) * htmlentities($result->ProductQuantity)); ?>
                                <span class="remove" >Remove</span>
                                </div>
                                <br>
                            </div>
                            <ul class="summary-prices">
                                <li>
                                <span>Subtotal:</span>
                                <span class="price">MYR <?php echo $totalprice; ?></span>
                                </li>
                                <li>
                                <span>Shipping:</span>
                                <span>MYR 
                                <?php if ($totalprice>400) {echo 0;}
                                if ($totalprice<=400 && $totalprice!=0) {echo 100; $totalprice = $totalprice + 100;}
                                else {echo 0;}?></span>
                                </li>
                            </ul>
                            <div class="summary-total">
                                <span>Total</span>
                                <span>MYR <?php echo $totalprice;?></span>
                                <input class="special" type="hidden" name="totalprice" value="<?php echo $totalprice;?>">
                            </div>
                            <div class="verified-icon">
                                <img src="images/shop/verified.png">
                            </div>
                            <!--</form>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                <div class="block billing-details">
                    <h4 class="widget-title">Shipping Details</h4>
                    <!--<form class="checkout-form" action="confirmation.php" method="post">-->
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" name="customername" placeholder="" required>                            
                        </div>
                        <div class="form-group">
                            <label for="user_address">Full Address</label>
                            <input type="text" class="form-control" name="customeraddress" placeholder="No, Street, Zip Code, City, State, Country" required>
                            <input class="special" type="hidden" name="status" value="0">
                        </div>
                    <!--</form>-->
                </div>
                <div class="block">
                    <h4 class="widget-title">Payment Method</h4>
                    <p>Credit Card Details (Secure payment)</p>
                    <div class="checkout-product-details">
                        <div class="payment">
                            <div class="card-details">
                            <!--<form  class="checkout-form" action="confirmation.php" method="post">-->
                                <div class="form-group">
                                    <label for="card-number">Card Number <span class="required">*</span></label>
                                    <input  id="card-number" class="form-control" type="tel" placeholder="•••• •••• •••• ••••" pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}">
                                </div>
                                <div class="form-group half-width padding-right">
                                    <label for="card-expiry">Expiry (MM/YY) <span class="required">*</span></label>
                                    <input id="card-expiry" class="form-control" type="tel" placeholder="MM / YY">
                                </div>
                                <div class="form-group half-width padding-left">
                                    <label for="card-cvc">Card Code <span class="required">*</span></label>
                                    <input id="card-cvc" class="form-control"  type="tel" maxlength="4" placeholder="CVC" pattern="[0-9]{4}">
                                </div>
                                <!--<button type="submit" name="submit3" class="btn btn-main mt-20" style="width: 100%;">Place Order</button>-->
                                <input type="submit" name="submit3" value="Place Order" class="btn btn-main mt-20" style="width: 100%;">
                            <!--</form>-->
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            <!--</form>-->
            </div>                
            </div>
        </div>
    </div>
    </div>
    </form>
    <?php }} ?>

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