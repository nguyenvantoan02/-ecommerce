<?php
    // $count = $_SESSION['count'];
    

    $conn = new mysqli('localhost', 'root', '123456', 'php2');

    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }
    $select = "SELECT COUNT(id_cmt) AS count FROM comments";
    $result = $conn->query($select);
    $count = $result->fetch_assoc();
    $count_main = $count['count'];

    //
    $select2 = "SELECT COUNT(user_id) AS count2 FROM accounts";
    $result2 = $conn->query($select2);
    $count2 = $result2->fetch_assoc();
    $count_main2 = $count2['count2'];
    //
    $select3 = "SELECT COUNT(contact_id) AS count3 FROM contacts";
    $result3 = $conn->query($select3);
    $count3 = $result3->fetch_assoc();
    $count_main3 = $count3['count3'];
    //    
    $select4 = "SELECT COUNT(p_id) AS count4 FROM products";
    $result4 = $conn->query($select4);
    $count4 = $result4->fetch_assoc();
    $count_main4 = $count4['count4'];


    // var_dump($_SESSION);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>admin page</title>
</head>
<body>
    <ul class="contents_statistical">
        <li>
            <i class="fa-solid fa-key" style="margin-bottom: 6px; color: #c6c627;"></i>
            <span style="color: #4e54c8;font-weight:600;"><?php echo $count_main2; ?><span style="color: #000;font-weight:500;">  Tài khoản</span></span>  
        </li>
        <li>
            <i class="fa-solid fa-comment" style="margin-bottom: 6px; color: blue;"></i>
            <span style="color: #4e54c8;font-weight:600;"><?php echo $count_main; ?><span style="color: #000;font-weight:500;">  Bình Luận</span></span>  
        </li>
        <li>
            <i class="fa-solid fa-address-card" style="margin-bottom: 6px; color: green;"></i>
            <span style="color: #4e54c8;font-weight:600;"><?php echo  $count_main3; ?><span style="color: #000;font-weight:500;">  Liên Hệ</span></span>  
        </li>
        <li>
            <i class="fa-brands fa-product-hunt" style="margin-bottom: 6px; color: orange;"></i>
            <span style="color: #4e54c8;font-weight:600;"><?php echo  $count_main4; ?><span style="color: #000;font-weight:500;">  Sản Phẩm</span></span>  
        </li>
    </ul>
</body>
</html>
