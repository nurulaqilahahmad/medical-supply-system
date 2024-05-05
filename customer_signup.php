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
//database connection file
include('includes/config.php');

if (isset($_POST['submit'])) {
  //getting the post values
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $contact = $_POST['contactnumber'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $code = $_POST['code'];
  $ppic = $_FILES["profilepic"]["name"];
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
    $sql = "INSERT INTO customer(Name, Username, Email, MobileNumber, Address, Password, Code, Image) VALUES(:name, :username, :email, :contact, :address, :password, :code, :imgnewfile)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':contact', $contact, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':code', $code, PDO::PARAM_STR);
    $query->bindParam(':imgnewfile', $imgnewfile, PDO::PARAM_STR);
    $query->execute();

    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      echo "<script>alert('You have successfully inserted the data');</script>";
      echo "<script type='text/javascript'> document.location ='customer_login.php'; </script>";
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
  <title>Customer Sign Up</title>

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

  <style>
    body {
      background-color: lightblue;
    }
  </style>

</head>

<body id="body">

  <section class="signin-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <a class="logo" href="main.php">
              <h1>M.S.S</h1>
            </a>
            <h2 class="text-center">Create Account</h2>
            <form class="text-left clearfix" action="customer_signup.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name" required="true">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="true">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="true">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="contactnumber" placeholder="Contact Number" required="true">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address (Street, ZIP, City, State)" required="true">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="true">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="code" placeholder="Security code" required="true">
              </div>

              <div class="form-group">
              <p>Profile Picture</p>
                <input type="file" class="form-control" name="profilepic">
                <span style="color:red; font-size:12px;">Only jpg / jpeg / png / gif format allowed.</span>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-main text-center" name="submit">Sign Up</button>
              </div>

            </form>
            <p class="mt-20">Already have an account ?<a href="customer_login.php"> Login</a></p>
            <p><a href="customer_forgotpassword.php"> Forgot your password?</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

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