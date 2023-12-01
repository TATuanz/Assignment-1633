<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../Admin/assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
		rel="stylesheet">

	<title>Home</title>

	<!-- Bootstrap core CSS -->
	<link href="../Admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="../Admin/assets/css/fontawesome.css">
	<link rel="stylesheet" href="../Admin/assets/css/style.css">
	<link rel="stylesheet" href="../Admin/assets/css/owl.css">

</head>

<body>

	<!-- ***** Preloader Start ***** -->
	<div id="preloader">
		<div class="jumper">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	<!-- ***** Preloader End ***** -->

	<!-- Header -->
	<header class="">
		<nav class="navbar navbar-expand-lg">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<h2> pot Store <em>Website</em></h2>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
					aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false">Category</a>

							<div class="dropdown-menu">
								<a>
									<?php
									require_once 'connectDB.php';
									$conn = connectDB();
									$query = "select CatID, CatName from category";
									$result = $conn->query($query);
									if (!$result) {
										die($conn->error);
									}
									while ($row = mysqli_fetch_assoc($result)) {
										?>
										<a href="category.php?id=<?php echo $row['CatID'] ?>" class="dropdown-item">
											<?php echo $row['CatName'] ?>
										</a>
										<?php
									}
									$query = "select prid, prname, cateid, summary, price, photo_name from product";
									$result = $conn->query($query); ?>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<!-- Page Content -->
	<div class="page-heading about-heading header-text"
		style="background-image: url(../Admin/assets/images/heading-6-1920x500.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="text-content">
						<h2> Welcome to Pot Store </h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="latest-products">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading">
						<h2>Featured Products</h2>
						<a href="category.php">view more <i class="fa fa-angle-right"></i></a>
					</div>
				</div>
				<?php while ($row = mysqli_fetch_assoc($result)) { ?>
					<div class="col-md-4">
						<div class="product-item">
							<a> <img width="370px" height="270px"
									src="../Admin/assets/images/<?php echo $row['photo_name'] ?>"
									style="object-fit: cover;" /></a>
							<div class="down-content">
								<a href="product-details.php?id=<?php echo $row['prid'] ?>">
									<h4>
										<?php echo $row['prname'] ?>
									</h4>
								</a>
								<h6> $
									<?php echo $row['price'] ?>
								</h6>
								<p>
									<?php echo $row['summary'] ?>
								</p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="inner-content">
						<p>Nguyen Thanh Hai - GCS210089</p>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- Bootstrap core JavaScript -->
	<script src="../Admin/vendor/jquery/jquery.min.js"></script>
	<script src="../Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


	<!-- Additional Scripts -->
	<script src="../Admin/assets/js/custom.js"></script>
	<script src="../Admin/assets/js/owl.js"></script>
</body>

</html>