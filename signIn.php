<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST['signIn'])) 
{
    include('connect.php');
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if (!$username || !$password) {
        header("Location:./signUp.php?error=1");
    }


    $query = mysqli_query("SELECT `us.Username`, `us.Password` FROM user WHERE 'us.Username'='$username'");
    if (mysqli_num_rows($query) == 0) {
        header("Location:./signUp.php?error=2");
    }
     

    $row = mysqli_fetch_array($query);
     

    if ($password != $row[`us.Password`]) {
        header("Location:./signUp.php?error=3");
    }
     

    $_SESSION['username'] = $username;
        header("Location:./index.php");

}
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
    include('nav.php');
?>


<div class="container">
 <div class= "error">
    <?php

        if(isset($_GET['error'])== true){
        $er = $_GET['error'];

    switch ($er) {
        case "1":
        echo "<div class='alert alert-danger' style='margin-top: 20px'>
                     <strong>Chú ý!</strong> Đăng kí không thành công
                </div>";
        break;
        case "2":
        echo "<div class='alert alert-danger' style='margin-top: 20px'>
                     <strong>Chú ý!</strong> Đăng kí không thành công
                </div>";
        break;
        case "3":
        echo "<div class='alert alert-danger' style='margin-top: 20px'>
                     <strong>Chú ý!</strong> Đăng kí không thành công
                </div>";
        break;
        }
    }
    ?>
</div>
</div>

 <div class="container" style="margin-top: 80px">
 	<div class="col-md-4">
 		<form action="signIn.php" method="POST">

    		<h3>Đăng nhập</h3>
    		<div class="form-group">
        		<label for="email">Username</label>
       			<input type="text" class="form-control" placeholder="Nhập Username" name="username">
    		</div>
    		<div class="form-group">
        		<label for="pws">Mật khẩu:</label>
        		<input type="text" class="form-control" placeholder="Nhập password" name="password">
    		</div>
    		<button type="submit" name ='signIn' class="btn btn-primary">Đăng nhập</button>
    	</form>
 	</div>
 </div>
 <?php
 	include('./footer.php');
 	?>