<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Phản Hồi</title>
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
        .feedback-form {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .feedback-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        .feedback-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .feedback-form textarea {
            width: 100%;
            height: 150px;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            resize: none;
            box-sizing: border-box;
        }
        .feedback-form textarea:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        }
        .feedback-form input[type="submit"] {
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
        .feedback-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php 
        if(isset($_GET['email'])){
            $email = $_GET['email'];
        
    ?>
    <form class="feedback-form" action="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=contacts&action=feedback_handle" method="post">
        <h2>Gửi Phản Hồi</h2>
        <input type="hidden" id="email" name="email" value="<?php echo htmlspecialchars($email)?>">
        <label for="feedback">Phản hồi của bạn:</label>
        <textarea id="feedback" name="feedback" placeholder="Nhập phản hồi của bạn ở đây..." required></textarea>
        
        
        <input type="submit" value="Gửi Phản Hồi">
    </form>
    <?php }; ?>
</body>
</html>
