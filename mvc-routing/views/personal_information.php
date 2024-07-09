<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/grid.css">
    <title>Personal Information</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 800px;
            margin: 100px auto 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .container h4 {
            margin-top: 0;
            font-size: 20px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .info {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .home {
            height: 50px;
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            display: flex;
            align-items: center;
            padding-left: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .home>a {
            color: #fff;
            font-size: 18px;
            text-decoration: none;
        }
        .home>a>i {
            margin-right: 10px;
        }
        .info .label {
            display: inline-block;
            width: 100px;
            color: #777;
        }
        .info span {
            color: #444;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_SESSION['email'])){
            $username = $_SESSION['username'];
            $user_id = $_SESSION['user_id'];
            $email = $_SESSION['email'];
    ?>
    
    <div class="grid wide">
        <header class="home">
            <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home"><i class="fas fa-house-user"></i> Home</a>
        </header>
        <div class="container">
            <h4>Thông tin người dùng <span style="color:#4e54c8;"><?php echo $username;?></span></h4>
            <div class="info">
                <span class="label">ID:</span>
                <span style="color:#4e54c8;"><?php echo $user_id;?></span>
            </div>
            <div class="info">
                <span class="label">Username:</span>
                <span style="color:#4e54c8;"><?php echo $username;?></span>
            </div>
            <div class="info">
                <span class="label">Email:</span>
                <span style="color:#4e54c8;"><?php echo $email;?></span>
            </div>
            <?php
                $conn = mysqli_connect('localhost','root','123456','php2');
                $select="SELECT * FROM address WHERE user_id = $user_id";
                $stmt = $conn->query($select);
                $result = $stmt->fetch_array();
                $address = isset($result['address'])?$result['address']:" ";
                $phone =  isset($result['phone_number'])?$result['phone_number']:" ";
                $_SESSION['address']= $address;
                $_SESSION['phone']= $phone ;
            ?>
            <div class="info">
                <span class="label">Address:</span>
                <span style="color:#4e54c8;"><?php echo $address;?></span>
            </div>
            <div class="info">
                <span class="label">Phone Number:</span>
                <span style="color:#4e54c8;"><?php echo $phone;?></span>
            </div>
        </div>
    </div>
    <?php } else {
        echo 'Không tìm thấy dữ liệu';
    }?>
</body>
</html>
