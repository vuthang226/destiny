<?php
session_start();
if(!isset($_SESSION['username'])){
	header('Location:./signIn.php');
}
if(!isset($_SESSION['cart'])){
	header('Location:./signIn.php');
}
include('./connect.php');
?>

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
<?php
include("./nav.php");
?>

	<div class="container">
	<div class= "error">
    <?php
    	$er = 0;
    	$totalprice=0; 
        if(isset($_GET['error'])== true){
        $er = $_GET['error'];

	switch ($er) {
    	case "1":
        echo "<div class='alert alert-danger' style='margin-top: 20px'>
                     <strong>Chú ý!</strong> Không đủ hàng
                </div>";
        break;
    	case "2":
        echo "<div class='alert alert-danger' style='margin-top: 20px'>
                     <strong>Chú ý!</strong> Lỗi kĩ thuật! vui lòng thử lại.
                </div>";
        break;
    	case "3":
        echo "<div class='alert alert-danger' style='margin-top: 20px'>
                     <strong>Chú ý!</strong> Đặt hàng thành công!Vui lòng để ý điện thoại.
                </div>";
        break;
    }
}
    ?>
</div>
</div>
<div class="container">



		<?php
		$us=$_SESSION['username'];
		echo'
		<div class="page-header">

		<h1>Giỏ hàng của bạn <small>Hi,'.$us.'</small></h1>

		</div>';
		?>






		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Image</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>

				<?php 
				if($er!=3){

				$sql="SELECT * FROM product WHERE `pd.productCode` IN ("; 

				foreach($_SESSION['cart'] as $id => $value) { 
					$sql.=$id.","; 
				} 

				$sql=substr($sql, 0, -1).") ORDER BY `pd.productCode` ASC"; 
				$querybag=mysqli_query($conn, $sql); 
				while($row=mysqli_fetch_array($querybag)){ 
					$subtotal=$_SESSION['cart'][$row['pd.productCode']]['quantity']*$row['pd.buyPrice']; 
					$totalprice+=$subtotal; 
					echo'
					<tr> 
						<th>'.$row['pd.productCode'].'</th>
						<th><img src="./img/product/'.$row['pd.image'].'" width="80px" height="60px"></th> 
						<th>'.$row['pd.productName'].'</th> 
						<th>'.$_SESSION['cart'][$row['pd.productCode']]['quantity'].'</th>
						<th>'.$row['pd.buyPrice'].'Đ/Đôi</th> 
						<th>
							<div class="btn-group">

								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

									Action <span class="caret"></span>

								</button>
								
								<ul class="dropdown-menu" role="menu">

									<li>
									<a href="./handlebag.php?id='.$row['pd.productCode'].'&back=0&name=addbag">+1 Quantity</a></li>
					
									<li><a href="./handlebag.php?id='.$row['pd.productCode'].'&back=0&name=subbag">-1 Quanlity</a></li>

									<li><a href="#">Remove</a></li>

									<li class="divider"></li>

									<li><a href="#">Remove all</a></li>
									
								</ul>
								


							</div>
						</th> 
					</tr>';
				
				}
			}
				?>
				<tr>
					<td colspan="6">Total: <?php echo ''.$totalprice.''?> Đ</td>
				</tr>

				</tbody>




			</table>
			<?php echo'
			<form action="./finish.php?total='.$totalprice.'" method="POST">
					<button type="submit" name ="finish" class="btn btn-primary">Chốt đơn</button>
			</form>';
			?>

		</div>
	





	<?php
	include("./footer.php")
	?>