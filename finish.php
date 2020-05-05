
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
$User=$_SESSION['username'];
$sql="SELECT * FROM product WHERE `pd.productCode` IN ("; 

foreach($_SESSION['cart'] as $id => $value) { 
	$sql.=$id.","; 
} 

$sql=substr($sql, 0, -1).") ORDER BY `pd.productCode` ASC"; 
$query=mysqli_query($conn, $sql); 
while($row=mysqli_fetch_array($query)){ 
	$quality_need=$_SESSION['cart'][$row['pd.productCode']]['quantity'];
	$quality_have=$row['pd.qualityinStock'];
	$id=$row['pd.productCode'];
	if($quality_have<=$quality_need){
		header('Location:./bag.php?error=1');
	}
}
$amount=intval($_GET['total']);

$order = mysqli_query($conn ,"
	INSERT INTO orders (
	`or.orderUser`,
	`or.amount`,	
	`or.orderDate`,
	`or.requiredDate`,
	`or.shippedDate`,
	`or.message`

	)
	VALUES (
	'$User',
	'$amount',
	NOW(),
	ADDDATE(NOW(), INTERVAL 30 DAY),
	null,
	null
	)
	");
$last = mysqli_query($conn ,"SELECT MAX(`or.orderNumber`) FROM `orders`");
$array=mysqli_fetch_array($last);
$lastid=$array['MAX(`or.orderNumber`)'];

$query=mysqli_query($conn, $sql); 
while($roww=mysqli_fetch_array($query)){ 
	$quality_need=$_SESSION['cart'][$roww['pd.productCode']]['quantity'];
	$quality_have=$roww['pd.qualityinStock'];
	$id=$roww['pd.productCode'];
	$price=$roww['pd.buyPrice'];
	$quality_have=$quality_have-$quality_need;
	$sql_up="UPDATE product SET `pd.qualityinStock`="; 
	$sql_up.=$quality_have." WHERE `pd.productCode`=";
	$sql_up.=$id;
	$update=mysqli_query($conn, $sql_up); 
	if($update){			
		$orderdetail=mysqli_query($conn ,"
			INSERT INTO orderdetails (
			`od.orderNumber`,
			`od.productCode`,
			`od.qualityOrdered`,
			`od.priceEach`
			)
			VALUES (
			'$lastid',
			'$id',
			'$quality_need',
			'$price'
			)
			");	

		unset($_SESSION['cart'][$id]);


	}else{header('Location:./bag.php?error=2');}

	
}header('Location:./bag.php?error=3');