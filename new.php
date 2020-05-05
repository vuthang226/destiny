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



				<?php 

				$sql="SELECT * FROM product WHERE `pd.productCode` IN ("; 

				foreach($_SESSION['cart'] as $id => $value) { 
					$sql.=$id.","; 
				} 


				$sql=substr($sql, 0, -1).") ORDER BY `pd.productCode` ASC"; 
				$query=mysqli_query($conn, $sql); 
				$totalprice=0; 

while ($row = mysqli_fetch_array($query)) { // Important line !!! Check summary get row on array ..
    echo $row['pd.productCode'];
}
