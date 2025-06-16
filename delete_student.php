<?php 
    // nhận pk
    $id = $_GET["id"];
    // truy vấn tìm sv theo id
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
    $sql = "delete from students where id=$id";
    $conn->query($sql);

// chuyển hướng về trang danh sách
header("Location: /student.php");