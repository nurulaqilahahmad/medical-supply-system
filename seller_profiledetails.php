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
	<?php include('includes/header1.php'); ?>

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
						<li><a href="main2.php">Dashboard</a></li>
						<li><a href="seller_viewpurchase.php">Orders</a></li>
						<li><a href="manage_product.php">Product</a></li>
						<li><a class="active" href="seller_profiledetails.php">Profile Details</a></li>
					</ul>

					<?php
					$pid = $_SESSION['login'];
					$sql = "SELECT *from seller where Email=:pid";
					$query = $dbh->prepare($sql);
					$query->bindParam(':pid', $pid, PDO::PARAM_STR);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$cnt = 1;
					if ($query->rowCount() > 0) {
						foreach ($results as $result) {
					?>

							<form name="profile" method="post">

								<div class="dashboard-wrapper dashboard-user-profile">
									<div class="media">
										<div class="media-body">
											<ul class="user-profile-list col-md-offset-4">
												<li><span>Full Name:</span><?php echo htmlentities($result->Name); ?></li>
												<li><span>Email:</span><?php echo htmlentities($result->Email); ?></li>
												<li><span>Phone:</span><?php echo htmlentities($result->MobileNumber); ?></li>
												<li><span>Business Address:</span><?php echo htmlentities($result->BusinessAddress); ?></li>
												<li><span>Business Owner:</span><?php echo htmlentities($result->BusinessOwner); ?></li>
												<a href="seller_editprofile.php" class="btn btn-transparent mt-20">Change Details</a>
											</ul>
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