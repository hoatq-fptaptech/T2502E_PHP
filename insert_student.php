<?php 
$name = $_POST["name"];
$age = $_POST["age"];
$telephone = $_POST["telephone"];
// chuyển thông tin thành câu SQL và truy vấn vào DB

//step 1: connect db
$host = "localhost";// máy tính của mình luôn
$user = "root";
$pass = "root";
$db_name = "t2502e_php";
$conn = new mysqli($host,$user,$pass,$db_name);
if($conn->connect_error){
    // nếu mà kết nối db lỗi
    die("Connect database failed!");
}
// step 2. Vieets SQL thêm dữ liệu
$sql = "insert into students(name,age,telephone) values('$name',$age,'$telephone')";
$conn->query($sql);

// chuyển hướng về trang danh sách
header("Location: /student.php");
