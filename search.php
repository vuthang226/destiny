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
	include('nav.php');
?>
<?php
	include('./connect.php');
?>
<div class="container">
	<table class="table table-striped table-hover navv">
	<thead class="fontheadSearch">
		<tr>
			<th>Image</th>
			<th>Name</th>
			<th>Price</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody class="fontbodySearch">
		<?php
			if(isset($_GET['ok'])){
				$search = addslashes($_GET['ok']);
				$sql ="SELECT * FROM product WHERE `pd.productName` LIKE '%$search%'";
				$query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                        echo '<tr>
						<th><img src="./img/product/'.$row['pd.image'].'" width="200px" height="150px"></th> 
						<th>'.$row['pd.productName'].'</th> 
						<th>'.$row['pd.buyPrice'].'Đ/Đôi</th> 
						<th><a href="./handlebag.php?id='.$row['pd.productCode'].'&back=0&name=addbag" type="button" class="btn btn-primary">Thêm Giỏ</a>
						<a href="./information.php?id='.$row['pd.productCode'].'" class="btn btn-default" role="button">Chi tiết</a>
                        </tr>';
                       
                    }
			}
		?>

	</tbody>
	</table>
</div>
<?php
	include('./footer.php');
?>


