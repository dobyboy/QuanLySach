<?php 
$hostname="localhost";
$username="root";
$password="";
$dbname="db_quanlysach";
// Tạo đối tượng mysqli
$conn = new mysqli($hostname,$username,$password,$dbname);
mysqli_set_charset($conn,'UTF8');
// Kiểm tra kết nối thành công hay thất bại
// nếu thất bại thì thông báo lỗi
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} 