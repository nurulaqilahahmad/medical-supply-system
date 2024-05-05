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
include('includes/config.php');

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $code = $_POST['code'];
  $newpassword = $_POST['password'];
  $sql = "SELECT email FROM customer WHERE email=:Email and code=:Code";

  $query = $dbh->prepare($sql);
  $query->bindParam(':Email', $email, PDO::PARAM_STR);
  $query->bindParam(':Code', $code, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $con = "update customer set Password=:newpassword where email=:Email and code=:Code";
    $newpss = $dbh->prepare($con);
    $newpss->bindParam(':Email', $email, PDO::PARAM_STR);
    $newpss->bindParam(':Code', $code, PDO::PARAM_STR);
    $newpss->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $newpss->execute();

    echo "<script>alert('You have successfully changed the password');</script>";
    echo "<script type='text/javascript'> document.location ='customer_login.php'; </script>";
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
  <title>Customer Forgot Password</title>

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

  <section class="forget-password-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <a class="logo" href="main.php">
              <h1>M.S.S</h1>
            </a>
            <h2 class="text-center">Forgot Password</h2>
            <form class="text-left clearfix" style="text-align: justify;"  action="customer_forgotpassword.php" method="post">
              <!--Please enter the email address for your account. A verification code will be sent to you. Once you have received the verification code, you will be able to choose a new password for your account.</p>-->
              <p>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Account email address">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="code" placeholder="Security code">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="New password">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-main text-center" name="submit">Request password reset</button>
              </div>
            </form>
            <p class="mt-20"><a href="customer_login.php">Back to log in</a></p>
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