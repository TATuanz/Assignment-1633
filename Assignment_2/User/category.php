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

	<title>Category</title>

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
									} ?>
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
						<h2>
							<?php if (isset($_GET['id'])) {
								$getID = $_GET['id'];
								$querytemp = "select * from category where $getID=CatID";
								$result = $conn->query($querytemp);
								$row = mysqli_fetch_assoc($result);
								echo $row['CatName'] . " ";
								$query = "select prid, prname, cateid, summary, price, photo_name from product where cateID=$getID";
								$result = $conn->query($query);
							} else {
								$query = "select prid, prname, cateid, summary, price, photo_name from product";
								$result = $conn->query($query);
							}
							echo "Category"; ?>
						</h2>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="products">
		<div class="container">
			<div class="row">
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

				<div class="col-md-12">
					<ul class="pages">
						<li class="active"><a href="#">1</a></li>
						<li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="inner-content">
						<p> Nguyen Thanh Hai - GCS210089</p>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="contact-form">
						<form action="#" id="contact">
							<div class="row">
								<div class="col-md-6">
									<fieldset>
										<input type="text" class="form-control" placeholder="Pick-up location"
											required="">
									</fieldset>
								</div>

								<div class="col-md-6">
									<fieldset>
										<input type="text" class="form-control" placeholder="Return location"
											required="">
									</fieldset>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<fieldset>
										<input type="text" class="form-control" placeholder="Pick-up date/time"
											required="">
									</fieldset>
								</div>

								<div class="col-md-6">
									<fieldset>
										<input type="text" class="form-control" placeholder="Return date/time"
											required="">
									</fieldset>
								</div>
							</div>
							<input type="text" class="form-control" placeholder="Enter full name" required="">

							<div class="row">
								<div class="col-md-6">
									<fieldset>
										<input type="text" class="form-control" placeholder="Enter email address"
											required="">
									</fieldset>
								</div>

								<div class="col-md-6">
									<fieldset>
										<input type="text" class="form-control" placeholder="Enter phone" required="">
									</fieldset>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary">Book Now</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Bootstrap core JavaScript -->
	<script src="../Admin/vendor/jquery/jquery.min.js"></script>
	<script src="../Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


	<!-- Additional Scripts -->
	<script src="../Admin/assets/js/custom.js"></script>
	<script src="../Admin/assets/js/owl.js"></script>
</body>

</html>