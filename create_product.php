<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_POST['submit'])) {
    //getting the post values
    $selleremail = $_SESSION['login'];
    $productname = $_POST['productname'];
    $productcompany = $_POST['productcompany'];
    $productlocation = $_POST['productlocation'];
    $productprice = $_POST['productprice'];
    $productstock = $_POST['productstock'];
    $productdetails = $_POST['productdetails'];
    $productshortdetails = $_POST['productshortdetails'];
    $productimage =  $_FILES['productimage']['name'];
    $productcategories = $_POST['productcategories'];

    // get the image extension
    $extension = substr($productimage, strlen($productimage) - 4, strlen($productimage));
    // allowed extensions
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if (!in_array($extension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {
        //rename the image file
        $imgnewfile = md5($imgfile) . time() . $extension;
        // Code for move image into directory
        move_uploaded_file($_FILES["productimage"]["tmp_name"], "images/shop/products/" . $imgnewfile);

        //Query for data insertion
        $sql = "INSERT INTO products(SellerEmail, ProductName,ProductCompany,productLocation,ProductPrice,ProductStock,ProductDetails,ProductShortDetails,ProductImage,ProductCategories) VALUES
        (:selleremail, :productname,:productcompany,:productlocation,:productprice,:productstock,:productdetails,:productshortdetails,:imgnewfile,:productcategories)";

        $query = $dbh->prepare($sql);
        $query->bindParam(':selleremail', $selleremail, PDO::PARAM_STR);
        $query->bindParam(':productname', $productname, PDO::PARAM_STR);
        $query->bindParam(':productcompany', $productcompany, PDO::PARAM_STR);
        $query->bindParam(':productlocation', $productlocation, PDO::PARAM_STR);
        $query->bindParam(':productprice', $productprice, PDO::PARAM_STR);
        $query->bindParam(':productstock', $productstock, PDO::PARAM_STR);
        $query->bindParam(':productdetails', $productdetails, PDO::PARAM_STR);
        $query->bindParam(':productshortdetails', $productshortdetails, PDO::PARAM_STR);
        $query->bindParam(':imgnewfile', $imgnewfile, PDO::PARAM_STR);
        $query->bindParam(':productcategories', $productcategories, PDO::PARAM_STR);
        $query->execute();

        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            echo "<script>alert('You have successfully inserted the data');</script>";
            echo "<script type='text/javascript'> document.location ='manage_product.php'; </script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Create Product | Medical Supply Shop</title>

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
                        <h1 class="page-name">Create Product</h1>
                        <ol class="breadcrumb">
                            <li><a href="main.php">Home</a></li>
                            <li class="active">Create</li>
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

                    <div class="page-wrapper">
                        <div class="dashboard-wrapper user-dashboard">
                            <div class="table-responsive">
                                <h4 class="widget-title">Product Details</h4>
                                <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                                <form class="checkout-form" action="create_product.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" class="form-control" name="productname" placeholder="" required="true">
                                    </div>

                                    <div class="form-group">
                                        <label for="product_company">Company</label>
                                        <input type="text" class="form-control" name="productcompany" placeholder="" required="true">
                                    </div>

                                    <div class="checkout-country-code clearfix">
                                        <div class="form-group">
                                            <label for="product_location">Location</label>
                                            <input type="text" class="form-control" name="productlocation" placeholder="" required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_categories">Categories</label>
                                            <input type="text" class="form-control" name="productcategories" placeholder="" required="true">
                                        </div>
                                    </div>

                                    <div class="checkout-country-code clearfix">
                                        <div class="form-group">
                                            <label for="product_price">Price (MYR)</label>
                                            <input type="text" class="form-control" name="productprice" placeholder="" required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_stock">Stock</label>
                                            <input type="text" class="form-control" name="productstock" placeholder="" required="true">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_shortdetails">Short Details</label>
                                        <input type="text" class="form-control" name="productshortdetails" placeholder="" required="true">
                                    </div>

                                    <div class="form-group">
                                        <textarea rows="6" class="form-control" name="productdetails" placeholder="Decription" required="true"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_image">Image</label>
                                        <input type="file" class="form-control" name="productimage" required="true">
                                    </div>
                                    <button type="submit" class="btn btn-main mt-20" name="submit">Create Product</button>
                                    <button type="reset" class="btn btn-main mt-20">Reset</button>
                                </form>
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