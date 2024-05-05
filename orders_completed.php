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
    <title>Orders | Medical Supply Shop</title>

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

    <!-- Profile Section -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Orders</h1>
                        <ol class="breadcrumb">
                            <li><a href="main.php">Home</a></li>
                            <li class="active">my orders</li>
                            <li class="active">Completed</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Order Section-->
    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <li><a href="main.php">Dashboard</a></li>
                        <li><a class="active" href="orders.php">Orders</a></li>
                        <li><a href="cart.php">Checkout</a></li>
                        <li><a href="customer_profiledetails.php">Profile Details</a></li>
                    </ul>
                    <!--Widget section-->
                    <div class="col-md-2">
                        <aside class="sidebar">
                            <div class="widget widget-category">
                                <h4 class="widget-title">Categories</h4>
                                <ul class="widget-category-list">
                                    <li><a href="orders.php">All</a></li>
                                    <li><a href="orders_toProcess.php">To Process</a></li>
                                    <li><a href="orders_toReceive.php">To Receive</a></li>
                                    <li><a class="active" href="orders_completed.php">Completed</a></li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <!--Orders detail-->
                    <div class="col-md-10">
                        <div class="dashboard-wrapper user-dashboard">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Shipping Details</th>
                                            <th>Items</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $customeremail = $_SESSION['login'];
                                    $sql = "SELECT * from `order` where CustomerEmail=:customeremail AND Status=2";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':customeremail', $customeremail, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo htmlentities($result->OrderId); ?></td>
                                                    <td><?php echo htmlentities($result->Creationdate); ?></td>
                                                    <td><?php echo htmlentities($result->CustomerName); ?><br><?php echo htmlentities($result->CustomerAddress); ?></td>
                                                    <td><?php echo htmlentities($result->ProductName); ?></td>
                                                    <td><?php echo htmlentities($result->ProductPrice); ?></td>
                                                    <td><?php echo htmlentities($result->ProductQuantity); ?></td>
                                                    <td><?php echo htmlentities($result->TotalPrice); ?></td>
                                                    <td><?php echo "Completed";
                                                        ?></td>
                                                </tr>
                                            </tbody>
                                    <?php }
                                    } ?>
                                </table>
                            </div>
                        </div>
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