<?php 
$id = $_POST["id"];
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
$sql = "update students set name='$name', age=$age, telephone='$telephone' where id=$id";
$conn->query($sql);

// chuyển hướng về trang danh sách
header("Location: /student.php");
