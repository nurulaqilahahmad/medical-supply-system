<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $profileepic = $_GET['ppic'];
    $productpath = "images/shop/products" . "/" . $ProductImage;
    $sql = "DELETE from products where ProductId=:rid";
    $sql = $dbh->prepare($sql);
    if ($sql) {
        $sql->bindParam(':rid', $rid, PDO::PARAM_STR);
        $sql->execute();
        unlink($productpath);
        echo "<script>alert('Product deleted');</script>";
        echo "<script>window.location.href = 'manage_product.php' </script>";
    } else {
        echo $dbh->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Manage Product | Medical Supply Shop</title>

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

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Manage Product</h1>
                        <ol class="breadcrumb">
                            <li><a href="main.php">Home</a></li>
                            <li class="active">Manage</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <li><a href="main2.php">Dashboard</a></li>
                        <li><a href="seller_viewpurchase.php">Orders</a></li>
                        <li><a class="active" href="manage_product.php">Products</a></li>
                        <li><a href="seller_profiledetails.php">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Company</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $productemail = $_SESSION['login'];
                                    $sql = "SELECT *from products where SellerEmail=:productemail";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':productemail', $productemail, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {
                                    ?>
                                            <form class="checkout-form" action="manage_product.php" method="GET" enctype="multipart/form-data">
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><img src="images/shop/products/<?php echo htmlentities($result->ProductImage); ?>" width="80" height="80"></td>
                                                    <td><?php echo htmlentities($result->ProductCompany); ?></td>
                                                    <td><?php echo htmlentities($result->ProductName); ?></td>
                                                    <td>MYR <?php echo htmlentities($result->ProductPrice); ?></td>
                                                    <td><?php echo htmlentities($result->ProductStock); ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="seller_product_single.php?productid=<?php echo ($result->ProductId); ?>" type="button" type="button" class="btn btn-default" title="View" data-toggle="tooltip"><i class="tf-ion-ios-search-strong" aria-hidden="true"></i></a>
                                                            <a href="manage_product.php?delid=<?php echo ($result->ProductId); ?>&&ppic=<?php echo htmlentities($result->ProductImage); ?>" type="button" name="delete" class="btn btn-default" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="tf-ion-close" aria-hidden="true"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </form>
                                    <?php $cnt = $cnt + 1;
                                        }
                                    } ?>
                                </tbody>
                            </table>
                            <div class="col-md-12">
                                <ul class="list-inline dashboard-menu text-center">
                                    <a href="create_product.php?createid=<?php echo htmlentities($result->ProductId); ?>"><button type="submit" class="btn btn-main text-center" name="submit">Create</button></a>
                                    <a href="edit_product.php?editid=<?php echo htmlentities($result->ProductId); ?>"><button type="submit" class="btn btn-main text-center" name="submit">Edit</button></a>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
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
                            <a href="shop.html">SHOP</a>
                        </li>
                        <li>
                            <a href="pricing.html">Pricing</a>
                        </li>
                        <li>
                            <a href="contact.html">PRIVACY POLICY</a>
                        </li>
                    </ul>
                    <p class="copyright-text">Copyright &copy;2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a></p>
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