<?php
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập
if (isset($_POST['signIn'])) 
{
    //Kết nối tới database
    include('connect.php');
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysqli_query("SELECT 'us.Username', 'us.Password' FROM user WHERE 'us.Username'='$username'");
    if (mysqli_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['us.Password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='./index.php'>Về trang chủ</a>";
    die();
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

 <div class="container" style="margin-top: 80px">
 	<div class="col-md-4">
 		<form action="signIn.php?do=login" method="POST">

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