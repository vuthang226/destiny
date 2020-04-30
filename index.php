
<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>web</title>
	<link rel ="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel ="stylesheet" href="./css/mycss.css">
	<script src="./bootstrap/jquery.min.js"></script>	
	<script src="./bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<?php session_start(); ?>
	<?php
		include('nav.php');
	?>


		
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

			<ol class="carousel-indicators">

				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

				<li data-target="#carousel-example-generic" data-slide-to="1"></li>

				<li data-target="#carousel-example-generic" data-slide-to="2"></li>

			</ol>
			<div class="carousel-inner">

				<div class="item active">

					<img src="img/Nike1.jpg" alt="Nike">

					<div class="carousel-caption">

						Bền bỉ

					</div>

				</div>

				<div class="item">
					<img src="img/Nike2.jpg" alt="Nike">
					<div class="carousel-caption">
						Năng động
					</div>
				</div>
				<div class="item">
					<img src="img/Nike3.jpg" alt="Nike">
					<div class="carousel-caption">
						Êm ái
					</div>
				</div>
			</div>

			<!-- Controls -->

			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">

				<span class="glyphicon glyphicon-chevron-left"></span>

			</a>

			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">

				<span class="glyphicon glyphicon-chevron-right"></span>

			</a>
		</div>
		<hr>
		<?php
			include('product.php');
		?>
		<?php
			include('footer.php');
		?>
		
		</body>

</html>