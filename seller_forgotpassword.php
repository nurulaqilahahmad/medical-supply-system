<?php
include('includes/config.php');

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $code = $_POST['code'];
  $newpassword = $_POST['password'];
  $sql = "SELECT email FROM seller WHERE email=:Email and code=:Code";

  $query = $dbh->prepare($sql);
  $query->bindParam(':Email', $email, PDO::PARAM_STR);
  $query->bindParam(':Code', $code, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $con = "update seller set password=:newpassword where email=:Email and code=:Code";
    $newpss = $dbh->prepare($con);
    $newpss->bindParam(':Email', $email, PDO::PARAM_STR);
    $newpss->bindParam(':Code', $code, PDO::PARAM_STR);
    $newpss->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $newpss->execute();

    echo "<script>alert('You have successfully changed the password');</script>";
    echo "<script type='text/javascript'> document.location ='seller_login.php'; </script>";
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
  <title>Seller Forgot Password | Medical Supply Shop</title>

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
      background-color: lightgreen;
    }
  </style>

</head>

<body id="body">

  <section class="forget-password-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <a class="logo" href="main.php"><h1>M.S.S</h1></a>
            <h2 class="text-center">Forgot Password</h2>
            <form class="text-left clearfix" style="text-align:justify;" action="seller_forgotpassword.php" method="post">
              <!--Please enter the email address for your account. A verification code will be sent to you.
                Once you have received the verification code, you will be able to choose a new password for your account.-->
              <p>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Account Email Address">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="code" placeholder="Security Code">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="New Password">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-main text-center" name="submit">Request Password Reset</button>
              </div>
            </form>
            <p class="mt-20"><a href="seller_login.php">Back to log in</a></p>
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