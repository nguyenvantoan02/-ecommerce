<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bình Luận</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .comment-form {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .comment-form h2 {
            margin-bottom: 20px;
            font-size: 21px;
            color: #333;
            text-align: center;
        }
        .comment-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .comment-form input[type="text"],
        .comment-form textarea,
        .comment-form select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;

        }
        .comment-form input[type="text"]:focus,
        .comment-form textarea:focus,
        .comment-form select:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        }
        .comment-form textarea {
            height: 150px;
            resize: none;
        }
        .comment-form input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .comment-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php 
        $conn = mysqli_connect('localhost','root','123456','php2');
        if(!$conn){
            die('kết nối không thành công');
        }
        $accounts= [];
        $select = "SELECT user_id,username FROM accounts";
        $result = mysqli_query($conn, $select);
        while($row = mysqli_fetch_array($result)){
            $accounts[] = $row;
        }

        $products= [];
        $select1 = "SELECT p_id,name FROM products";
        $result1 = mysqli_query($conn, $select1);
        while($row1 = mysqli_fetch_array($result1)){
            $products[] = $row1;
        }


     
    ?>
    <form class="comment-form" action="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=comments&action=create_handle" method="post">
        <h2>Thêm Bình Luận</h2>
        
        <label for="user_id">ID Người Dùng:</label>
        <select id="user_id" name="user_id" required>
            <?php foreach($accounts as $acc_child){?>
            <option value="<?php echo $acc_child['user_id'] ?>"><?php echo $acc_child['user_id']?></option>
            <?php }; ?>
        </select>

        <label for="username">Tên người dùng:</label>
        <select id="username" name="username" required>
            <?php foreach($accounts as $acc_child){?>
            <option value="<?php echo $acc_child['username'] ?>"><?php echo $acc_child['username']?></option>
            <?php }; ?>
        </select>
        
        <!-- <label for="username">Tên Người Dùng:</label>
        <input type="text" id="username" name="username" required placeholder="Thêm tên người dùng."> -->
        
        <label for="p_id">ID Sản Phẩm:</label>
        <select id="p_id" name="p_id" required>
            <?php foreach($products as $prd_child){?>
            <option value="<?php echo $prd_child['p_id']?>"><?php echo $prd_child['name']?></option>
            <?php }; ?>
        </select>
        
        <label for="content">Nội Dung Bình Luận:</label>
        <textarea id="content" name="content" placeholder="Nhập bình luận của bạn ở đây..." required></textarea>
        
        <input type="submit" value="Gửi Bình Luận">
    </form>
</body>
</html>
