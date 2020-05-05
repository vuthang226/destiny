
<p class="text-center">New arrival<hr></p>
		<div class="container-fluid">
			<div class="row">
<?php
	include('./connect.php');
	for ($i = 1; $i <= 3; $i++) {
    	$result = mysqli_query($conn, "SELECT * FROM product WHERE `pd.productCode`= $i");
		$row1[$i] =  mysqli_fetch_array($result);
		echo'
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="./img/product/'.$row1[$i][6].'" >
						<div class="caption">
							<h3>' . $row1[$i][1] .'</h3>
							<p>'. $row1[$i][7].'</p>
							<p>' .$row1[$i][5].' đ</p>
							<form action="./handlebag.php?id='.$i.'&back=1" method="POST">
							<button type="submit" name ="addbag" class="btn btn-primary">+ Giỏ</button>
							<a href="./information.php?id='.$i.'" class="btn btn-default" role="button">Chi tiết</a>
							</form> 

						</div>
					</div>
				</div>
			';}
?>
			</div>
			<div class="row">
<?php
	for ($i = 4; $i <= 6; $i++) {
    	$result = mysqli_query($conn, "SELECT * FROM product WHERE `pd.productCode`=$i");
		$row1[$i] =  mysqli_fetch_array($result);
		echo'
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="./img/product/'.$row1[$i][6].'" >
						<div class="caption">
							<h3>' . $row1[$i][1] .'</h3>
							<p>'. $row1[$i][7].'</p>
							<p>' .$row1[$i][5].' đ</p>
							<form action="./handlebag.php?id='.$i.'&back=1" method="POST">
							<button type="submit" name ="addbag" class="btn btn-primary">+ Giỏ</button>
							<a href="./information.php?id='.$i.'" class="btn btn-default" role="button">Chi tiết</a>
							</form>
						</div>
					</div>
				</div>
			';
		}
?>
</div>
</div>