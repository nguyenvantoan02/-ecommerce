<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Bình Luận</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .comment-form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        .comment-form h2 {
            margin-bottom: 20px;
            font-size: 20px;
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
        .comment-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .comment-form input[type="text"]:focus,
        .comment-form textarea:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        }
        .comment-form textarea {
            height: 100px;
            resize: none;
        }
        .comment-form input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        .comment-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id_cmt = $_GET['id_cmt'];
            $user_id = $_GET['user_id'];
            $user_name = $_GET['user_name'];
            $p_id = $_GET['p_id'];
            $content = $_GET['content'];
            $time_create = $_GET['time_create'];
        
    ?>
    <form class="comment-form" action="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=comments&action=update_handle" method="post">
        <h2>Cập Nhật Bình Luận</h2>
        <input type="hidden" name="id_cmt" value="<?php echo htmlspecialchars($id_cmt);?>">
        
        <label for="user_id">ID Người Dùng:</label>
        <input type="text" id="user_id" name="user_id" value="<?php echo htmlspecialchars($user_id);?>" required readonly>

        <label for="user_name">Tên người dùng:</label>
        <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars($user_name);?>" required readonly>

        <label for="p_id">ID Sản Phẩm:</label>
        <input type="text" id="p_id" name="p_id" value="<?php echo htmlspecialchars($p_id);?>" required readonly>
        
        <label for="time_create">Thời Gian Tạo:</label>
        <input type="text" id="time_create" name="time_create" value="<?php echo htmlspecialchars($time_create);?>" required>

        <label for="content">Nội Dung Bình Luận:</label>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($content);?></textarea>

        <input type="submit" value="Cập Nhật Bình Luận">
    </form>
    <?php }; ?>
</body>
</html>
