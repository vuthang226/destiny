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
include('./connect.php');

    if(isset($_POST['signUp'])){


    $fullname   = trim($_POST['fullname']);
    $email      = trim($_POST['email']);
    $phone      = trim($_POST['phone']);
    $address    = trim($_POST['address']);
    $username   = trim($_POST['username']);
    $password   = trim($_POST['pw']);
    $cfpassword = trim($_POST['cfpw']);
    $isPassed   = true;


    	if (!$username || !$password || !$email || !$fullname || !$phone || !$address || !$cfpassword)
    	{
        	header("Location:./sign_up.php?error=1");
        	$isPassed = false;
    	}

    	if (!preg_match('#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#', $email))
    	{
            header("Location:./sign_up.php?error=2");
            $isPassed = false;
    	}

    	if (mysqli_num_rows(mysqli_query($conn ,"SELECT 'us.Email' FROM user WHERE 'us.Email'='$email'")) > 0)
    	{
        	header("Location:./sign_up.php?error=3");
            $isPassed = false;
    	}

    	if (mysqli_num_rows(mysqli_query($conn ,"SELECT 'us.Phone' FROM user WHERE 'us.Phone'='$phone'")) > 0)
    	{
        	header("Location:./sign_up.php?error=4");
            $isPassed = false;
    	}



    	if (mysqli_num_rows(mysqli_query($conn ,"SELECT 'us.Username' FROM user WHERE 'us.Username'='$username'")) > 0){
        	header("Location:./sign_up.php?error=5");
            $isPassed = false;    	
        }

    	if(trim($password) == ''&& strlen($password)>6){
            header("Location:./sign_up.php?error=6");
            $isPassed = false;
        }


        if($password!= $cfpassword){
                header("Location:./sign_up.php?error=7");
                $isPassed = false;
        }


        if($isPassed){
    		$result = mysqli_query($conn ,"
		        INSERT INTO user (
		            'us.Full Name',
		            'us.Username',
		            'us.Password',
		            'us.Email',
		            'us.Phone',
		            'us.Address'

		        )
		        VALUES (
		            '$fullname',
		            '$username',
		            '$password',
		            '$email',
		            '$phone',
		            '$address'
		        )
		    ");
                if($result){
                	header("Location:./signIn.php");
                }
                else{
                    header("Location:./signUp.php?error=8");
                }
            }
            
        }
        mysqli_close($conn);
    
 ?>


<?php
    include('nav.php');
 ?>


 <div class= "error">
    <?php

        if(isset($_GET['error'])== true){
        $er = $_GET['error'];

	switch ($er) {
    	case "1":
        echo "<div class='alert alert-danger' style='margin-top: 3px'>
                     <strong>Chú ý!</strong> Đăng kí không thành công
                </div>";
        break;
    	case "2":
        echo "<div class='alert alert-danger' style='margin-top: 3px'>
                     <strong>Chú ý!</strong> Đăng kí không thành công
                </div>";
        break;
    	case "3":
        echo "<div class='alert alert-danger' style='margin-top: 3px'>
                     <strong>Chú ý!</strong> Đăng kí không thành công
                </div>";
        break;
        case "4":
        echo "<div class='alert alert-danger' style='margin-top: 3px'>
                     <strong>Chú ý!</strong> Đăng kí không thành công
                </div>";
        break;
        case "5":
        echo "<div class='alert alert-danger' style='margin-top: 3px'>
                     <strong>Chú ý!</strong> Đăng kí không thành công
                </div>";
        break;
    	case "6":
        echo "<div class='alert alert-danger' style='margin-top: 3px'>
                     <strong>Chú ý!</strong> Đăng kí không thành công
                </div>";
        break;
    	case "7":
        echo "<div class='alert alert-danger' style='margin-top: 3px'>
                     <strong>Chú ý!</strong> Đăng kí không thành công
                </div>";
        break;   


}
}
    ?>
</div>


 <div class="container" style="margin-top: 80px">
 	<div class="col-md-4">
<form action="xlsignUp.php" method="POST">
    <h3>Đăng kí</h3>
    <div class="form-group">
        <label for="email">Họ và Tên:</label>
        <input type="text" class="form-control" placeholder="Nhập học và tên" name="fullname">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" placeholder="Nhập vào email" name="email">
    </div>
    <div class="form-group">
        <label for="email">Số điện thoại:</label>
        <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone">
    </div>
    <div class="form-group">
        <label for="email">Địa chỉ:</label>
        <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address">
    </div>
    <div class="form-group">
        <label for="email">Tên đăng nhập:</label>
        <input type="text" class="form-control" placeholder="Nhập tên đăng nhập" name="username">
    </div>
    <div class="form-group">
        <label for="pwd">Mật khẩu(phải lớn hơn 6 kí tự):</label>
        <input type="password" class="form-control" placeholder="Nhập vào mật khẩu" name="pw">
    </div>

    <div class="form-group">
        <label for="pwd">Xác nhận mật khẩu:</label>
        <input type="password" class="form-control" placeholder="Nhập vào mật khẩu" name="cfpw">
    </div>

    <button type="submit" name ='signUp' class="btn btn-primary">Đăng kí</button>
    <button class="btn" hrel="./signIn.php">Đăng nhập</button>
</form>
</div>
</div>
<?php
include('footer.php');
?>