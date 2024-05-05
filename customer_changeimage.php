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

if (strlen($_SESSION['login']) == 0) {
  header('location:main.php');
} else {
  if (isset($_POST['submit'])) {
    $email = $_SESSION['login'];

    //getting the post values
    $ppic = $_FILES["profilepic"]["name"];
    $oldppic = $_POST['oldpic'];
    $oldprofilepic = "profilepics" . "/" . $oldppic;
    // get the image extension
    $extension = substr($ppic, strlen($ppic) - 4, strlen($ppic));
    // allowed extensions
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if (!in_array($extension, $allowed_extensions)) {
      echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {
      //rename the image file
      $imgnewfile = md5($imgfile) . time() . $extension;
      // Code for move image into directory
      move_uploaded_file($_FILES["profilepic"]["tmp_name"], "images/" . $imgnewfile);

      //Query for data insertion
      $sql = "update customer set Image=:imgnewfile where Email=:email";
      $query = $dbh->prepare($sql);
      $query->bindParam(':email', $email, PDO::PARAM_STR);
      $query->bindParam(':imgnewfile', $imgnewfile, PDO::PARAM_STR);
      $query->execute();
      $lastInsertId = $dbh->lastInsertId();

      if ($sql) {
        //Old pic
        unlink($oldprofilepic);
        echo "<script>alert('Profile pic updated successfully');</script>";
        echo "<script type='text/javascript'> document.location ='customer_profiledetails.php'; </script>";
      } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
      }
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

  <!-- Profile Section -->
  <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <h1 class="page-name">Dashboard</h1>
            <ol class="breadcrumb">
              <li><a href="main.php">Home</a></li>
              <li class="active">my account</li>
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
            <li><a href="main.php">Dashboard</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="checkout.php">Checkout</a></li>
            <li><a class="active" href="customer_profiledetails.php">Profile Details</a></li>
          </ul>

          <?php
          $pid = $_SESSION['login'];
          $sql = "SELECT *from customer where Email=:pid";
          $query = $dbh->prepare($sql);
          $query->bindParam(':pid', $pid, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {
          ?>
              <form name="profile" method="post" action="customer_changeimage.php" enctype="multipart/form-data">
                <div class="dashboard-wrapper dashboard-user-profile">
                  <div class="media">
                    <input type="hidden" name="oldpic" value="<?php echo htmlentities($result->Image); ?>">

                    <div class="form-group" href="#!">
                      <img class="media-object user-img" src="images/<?php echo htmlentities($result->Image); ?>" alt="Image">
                    </div>

                    <div class="form-group">
                      <input type="file" class="form-control" name="profilepic" required="true">
                      <span style="color:red; font-size:12px;">Only jpg / jpeg / png / gif format allowed.</span>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-main text-center" name="submit">Update</button>
                      <button onclick="document.location='customer_profiledetails.php'" class="btn btn-main text-center" name="cancel">Cancel</button>
                    </div>

                  </div>
                </div>
              </form>
          <?php }
          } ?>

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