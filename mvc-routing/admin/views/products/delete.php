<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>admin page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
        }
        form {
            margin-top: 20px;
        }
        input[type="submit"], button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #0056b3;
        }
        button {
            margin-left: 10px;
            background-color: #dc3545;
        }
    </style>

</head>
<body>
<div id="wrapper">
    <?php include 'views/layouts/header.php'; ?>
        <div id="admin_container">
            <?php include 'views/layouts/sideBar.php'; ?>
            <section class="contents">
            <?php   
                if(isset($_GET['ma'])){
                    $ma = $_GET['ma'];
                    
            ?>
            <div class="container">
                <h2>Xác nhận xóa</h2>
                
                
                <p>Bạn có chắc chắn muốn xóa mục <?php echo $ma;?> này?</p>
                <form action="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=delete_handle" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($ma)?>">
                    <input type="submit" name="submit" value="Xác nhận">
                    <button type="submit" name="cancel">Hủy bỏ</button>
                </form>
            </div>
            <?php }else{
                echo "chưa nhận được dữ liệu";
                }
            ?>
            </section>
        </div>
    </div>
</body>
</html>