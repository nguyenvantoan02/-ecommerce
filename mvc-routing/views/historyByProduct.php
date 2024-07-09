<!DOCTYPE html>
<html lang="vi">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/home.css">    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>


    <style>
         body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .container { padding: 1em; }
        .order-item:hover { box-shadow: 0 0 2px blue; transform: translateY(-2px);}
        .order-item { display: flex; border: 1px solid #ccc; padding: 1em; margin-bottom: 1em; border-radius: 5px;}
        .order-item img { width: 100px; height: 100px; object-fit: cover; margin-right: 1em; }
        .order-details { flex-grow: 1; display: flex; flex-direction: column; }
        .order-details h2 { margin: 0 0 0.5em 0; font-size: 20px; color:#125dc1; }
        .order-details p { margin: 0.5em 0; }
        .order-details span { font-weight: bold; color: #000; }
        .order-meta { display: flex; flex-direction: column; text-align: right; }
        .order-meta .order-quantity, .order-meta .order-status { margin-top: 0.5em; }
    </style>
</head>
<body>

    <?php require('layouts/header.php');?>
    <p style="margin: 180px 100px 50px 0; text-align: end;">Lịch sử mua hàng</p>
    <div class="container">
        <?php
            $conn = new mysqli('localhost', 'root', '123456', 'php2');

            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }
        ?>
    <?php foreach($sanpham[1] as $sp){
        $tmp_prd = $sp['p_id'];
        $select = "SELECT * FROM products WHERE p_id = '$tmp_prd'";
        $result = mysqli_query($conn, $select);
        $row = mysqli_fetch_array($result);
    ?>
        <!-- Mẫu đơn hàng -->
        <div class="order-item">
            <img src="<?php echo $row['img']?>" alt="Sản phẩm A">
            <div class="order-details">
                <h2><?php echo $row['name']?></h2>
                <p><?php echo $row['information']?></p>
                <p>Đơn giá: <?php echo $row['price_new']?>đ</p>
                <span style="margin-top: 10px;">Tổng tiền thanh toán: <?php echo $sp['total_price'] ?>đ</span>
                
            </div>
            <div class="order-meta">
                <div class="order-quantity">Số lượng: <?php echo $sp['quantity'] ?></div>
                <div class="order-quantity">Thời gian mua: <?php echo $sp['time_create'] ?></div>
                <div class="order-status">Trạng thái: Chờ xác nhận <?php?></div>
            </div>
        </div>
        <?php };?>
        <!-- Kết thúc mẫu đơn hàng -->
    </div>
    <?php require('layouts/footer.php');?>
</body>
</html>
