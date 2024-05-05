<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html>

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

<body>

	<!-- Start Top Header Bar -->
	<?php include('includes/header1.php'); ?>

	<!-- Purchase Section -->

	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<h1 class="page-name">Orders List</h1>
						<ol class="breadcrumb">
							<li><a href="main.php">Home</a></li>
							<li class="active">orders</li>
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
						<li><a class="active" href="seller_viewpurchase.php">Orders</a></li>
						<li><a href="manage_product.php">Products</a></li>
						<li><a href="seller_profiledetails.php">Profile Details</a></li>
					</ul>
				

				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<tr align="center">
								<th>#</th>
								<th>Order ID</th>
								<th>Shipping Details</th>
								<th>Product Name</th>
								<th>Product Price</th>
								<th>Quantity</th>
								<th>Total Price(RM)</th>
								<th>Status</th>
							</tr>

							<?php $i = 0;
							$selleremail = $_SESSION['login'];
							$sql = "SELECT * FROM `order` where SellerEmail=:selleremail";
							$query = $dbh->prepare($sql);
							$query->bindParam(':selleremail', $selleremail, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							$cnt = 1;

							if ($query->rowCount() > 0) {
								foreach ($results as $result) { ?>

									<tr align="left">
										<td><?php echo ++$i; ?>)</td>
										<td><?php echo htmlentities($result->OrderId); ?></td>
										<td><?php echo htmlentities($result->CustomerName);  ?><br><?php echo htmlentities($result->CustomerAddress);  ?></td>
										<td><?php echo htmlentities($result->ProductName); ?></td>
										<td><?php echo htmlentities($result->ProductPrice); ?></td>
										<td><?php echo htmlentities($result->ProductQuantity); ?></td>
										<td><?php echo htmlentities($result->TotalPrice); ?></td>
										<td><?php if ($result->Status == 0) {
												echo "To Process";
											}
											if ($result->Status == 1) {
												echo "To Deliver";
											}
											if ($result->Status == 2) {
												echo "Completed";
											}

											?></td>
									</tr>

							<?php }
							} ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>





	<br>
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