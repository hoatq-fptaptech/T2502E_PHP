<?php 
   $list = [];
   // lấy được các sinh viên từ table students trong db ra
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
    // nếu sống sót ra đây thì tức là connect thành công
    // step 2: query
    $sql = "select * from students";
    $rs = $conn->query($sql);
    if($rs->num_rows > 0){
        // đọc dữ liệu từ $rs ra $list ở trên để sử dụng
        while($row = $rs->fetch_assoc()){
            $list[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("common/meta.php");?>
</head>
<body>
    <div class="container">
    <h1>Danh sách sinh viên:</h1>
    <a href="form_student.php">Thêm sinh viên</a>
    <table class="table">
        <thead>
            <th>Name</th>
            <th>Age</th> 
            <th>Telephone</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach($list as $s):?>
            <tr>
                <td><?php echo $s["name"];?></td>
                <td><?php echo $s["age"];?></td>
                <td><?php echo $s["telephone"];?></td>
                <td><a href="/edit_student.php?id=<?php echo $s["id"]; ?>">Sửa</a></td>
                <td><a onclick="return confirm('Bạn chắc chắn muốn xoá SV: <?php echo $s['name']; ?>')" href="/delete_student.php?id=<?php echo $s["id"]; ?>">Xoá</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
</body>
</html>