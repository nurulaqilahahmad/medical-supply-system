<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_POST['submit1'])) {
    $productemail = $_SESSION['login'];
    $productid = $_POST['productid'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $sql = "SELECT SellerEmail FROM products WHERE SellerEmail=:productemail and ProductId=:productid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':productemail', $productemail, PDO::PARAM_STR);
    $query->bindParam(':productid', $productid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $con = "update products set ProductPrice=:price, ProductStock=:stock where SellerEmail=:productemail and ProductId=:productid";
        $newdet = $dbh->prepare($con);
        $newdet->bindParam(':productemail', $productemail, PDO::PARAM_STR);
        $newdet->bindParam(':productid', $productid, PDO::PARAM_STR);
        $newdet->bindParam(':price', $price, PDO::PARAM_STR);
        $newdet->bindParam(':stock', $stock, PDO::PARAM_STR);
        $newdet->execute();

        echo "<script>alert('You have successfully changed the details');</script>";
        echo "<script type='text/javascript'> document.location ='manage_product.php'; </script>";
    } else {
        echo "<script>alert('Email id or code is invalid. Please try again');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Edit Product | Medical Supply Shop</title>

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
                        <h1 class="page-name">Edit Product</h1>
                        <ol class="breadcrumb">
                            <li><a href="main.php">Home</a></li>
                            <li class="active">Edit</li>
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
                                            <form class="edit" action="edit_product.php" method="POST" enctype="multipart/form-data">
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->ProductCompany); ?></td>
                                                    <td><?php echo htmlentities($result->ProductName); ?></td>
                                                    <input class="special" type="hidden" name="productid" value="<?php echo htmlentities($result->ProductId); ?>">
                                                    <td><input type="text" class="form-control" name="price" required="true" placeholder="New Price (MYR)"></td>
                                                    <td><input type="text" class="form-control" name="stock" required="true" placeholder="New Stock Available"></td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <ul class="list-inline dashboard-menu text-center">
                                                                <button type="submit" class="btn btn-main text-center" name="submit1">Update</button>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </form>
                                    <?php $cnt = $cnt + 1;
                                        }
                                    } ?>
                                </tbody>
                            </table>

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