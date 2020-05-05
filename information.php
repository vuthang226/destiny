

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
include('./nav.php');
include('./connect.php');
?>

<?php
 $id=$_GET['id'];
 $query= mysqli_query($conn, "SELECT * FROM product
                WHERE `pd.productCode`= {$id}"); 
 $row=mysqli_fetch_array($query);
 $name=$row['pd.productName'];
 $line=$row['pd.productline'];
 $vendor=$row['pd.productVendor'];
 $des=$row['pd.productDescription'];
 $price=$row['pd.buyPrice'];
 $img=$row['pd.image'];
 $gender=$row['pd.gender'];
 $stock=$row['pd.qualityinStock'];


echo'

	
<div class="container">
	<ol class="breadcrumb">

  <li><a href="./index.php">Home</a></li>

  <li><a href="./index.php">'.$line.'</a></li>

  <li class="active">'.$name.'</li>

</ol>
	<div class="media">

  <a class="pull-left" href="#">

    <img class="media-object" src="./img/product/'.$img.'" alt="Giày" width="480px" height="360px">

  </a>

  <div class="media-body">

    <h2 class="media-heading">'.$name.'</h2>
    <h4>'.$gender.'</h4>
    <p>'.$des.'</p>
    <br>
    <h4>Giá: '.$price.'Đ</h4>
    <hr>
    <p>Còn lại: '.$stock.'<p>
    <form action="./handlebag.php?id='.$id.'&back=0" method="POST">
	<button type="submit" name ="addbag" class="btn btn-primary">+ Giỏ</button>
	<a href="./information.php?id='.$id.'" class="btn btn-default" role="button">Chi tiết</a>
	</form> 

  </div>

</div>

</div>';
?>

<?php
include('./footer.php')
?>