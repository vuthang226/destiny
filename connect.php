<?php 
    // Kết nối CSDL
$conn = new mysqli('localhost', 'root', '', 'web');
 
// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
?>