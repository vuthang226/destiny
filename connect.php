<?php 
    // Kết nối CSDL
$conn = new mysqli('remotemysql.com', 'rkvq6WmduH', 'jgYQHYUlha', 'rkvq6WmduH');
 
// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
?>