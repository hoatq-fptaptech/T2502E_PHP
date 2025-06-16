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
    // nếu sống sót ra đây thì tức là connect thành công
    // step 2: query
    $sql = "select * from students where id = $id";
    $rs = $conn->query($sql);
    $student = null;
    if($rs->num_rows > 0){
        // đọc dữ liệu từ $rs ra $list ở trên để sử dụng
        $student = $rs->fetch_assoc();
    }else{
        die("404 not found!");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
    <?php include("common/meta.php");?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h1>Sửa thông tin sinh viên</h1>
                <form action="/update_student.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $student["id"]; ?>"/>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" value="<?php echo $student["name"]; ?>" class="form-control" id="name" aria-describedby="student name">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" min="1" name="age" value="<?php echo $student["age"]; ?>" class="form-control" id="age">
                    </div>
                   <div class="mb-3">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="text" name="telephone" value="<?php echo $student["telephone"]; ?>" class="form-control" id="telephone">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>