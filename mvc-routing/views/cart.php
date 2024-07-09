<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .home{
            height:40px;
            background-color: #444;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }
        .home>a{
            color: #fff;
            font-size: 16px;
            line-height: 40px;
            margin-left: 50px;
        }
        .cart {
            width: 100%;
            max-width: 800px;
            margin: 50px auto 50px auto;
        }
        .cart-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 20px 0;
        }
        .cart-item img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            margin-right: 20px;
        }
        .cart-item-info {
            flex: 1;
        }
        .cart-item-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .cart-item-description {
            margin-bottom: 10px;
            color: #555;
            font-size: 15px;
        }
        .cart-item-prices {
            display: flex;
            align-items: center;
        }
        .cart-item-old-price {
            text-decoration: line-through;
            color: #999;
            margin-right: 10px;
            font-size: 14px;
        }
        .cart-item-new-price {
            font-size: 17px;
            color: #e74c3c;
        }
        .cart-buy-again{
            background-color: #666;
            color: #fff;
            border: none;
            padding: 4px 6px;
            margin-right: 50px;
        }
        .cart-buy-again:hover{
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <?php include 'layouts/header.php'; ?>
    <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=historyByProduct" style="margin: 120px 50px 20px 0; display: block; text-align: end; text-decoration: none;">.Lịch sử mua hàng của tôi</a>
    <div class="cart">
        <h3>Giỏ hàng.</h3>
        <?php foreach ($cart as $cart_child){?>
            <form action="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?" method="get" class="cart-item">
                <input type="hidden" name="controller" value="page">
                <input type="hidden" name="action" value="detail">
                <img src="<?php  echo $cart_child['cart_product_img']; ?>" alt="Sản phẩm 1">
                <input type="hidden" name="img" value="<?php echo htmlspecialchars($cart_child['cart_product_img']);?>">
                <div class="cart-item-info">
                    <div class="cart-item-title"><?php echo $cart_child['cart_product_name']; ?></div>
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($cart_child['cart_product_name']);?>">
                    <div class="cart-item-description"><?php echo $cart_child['cart_information']; ?></div>
                    <input type="hidden" name="information" value="<?php echo htmlspecialchars($cart_child['cart_information']);?>">
                    <?php
                        $conn = mysqli_connect('localhost','root','123456','php2');
                        $result_searchPrice = $cart_child['p_id'];
                        $select = "SELECT price_old,sell_number,time_create,category_id,address,tel FROM products WHERE p_id = '$result_searchPrice'";
                        $result = mysqli_query($conn,$select);
                        $row = mysqli_fetch_array($result);
                        $price_old = $row['price_old'];
                        $sell_number = $row['sell_number'];
                        $category_id = $row['category_id'];
                        $time_create = $row['time_create'];
                        $address = $row['address'];
                        $tel = $row['tel'];

                    ?>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($result_searchPrice);?>">
                    <input type="hidden" name="address" value="<?php echo htmlspecialchars($address);?>">
                    <input type="hidden" name="tel" value="<?php echo htmlspecialchars($tel);?>">
                    <input type="hidden" name="price_new" value="<?php echo htmlspecialchars($cart_child['cart_product_price']);?>">
                    <input type="hidden" name="price_old" value="<?php echo htmlspecialchars($price_old);?>">
                    <input type="hidden" name="sell_number" value="<?php echo htmlspecialchars($sell_number);?>">
                    <input type="hidden" name="time_create" value="<?php echo htmlspecialchars($time_create);?>">
                    <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category_id);?>">

                    <div class="cart-item-prices">
                        <div class="cart-item-new-price"><?php echo  $cart_child['cart_product_price']; ?> VND</div>
                    </div>
                </div>
                <input type="submit" value="Mua ngay" class="cart-buy-again">
            </form>
        <?php } ?>
    </div>
    <?php include 'layouts/footer.php';?>
</body>
</html>
