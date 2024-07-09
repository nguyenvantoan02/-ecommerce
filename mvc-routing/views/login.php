<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>Form Đăng Ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .registration-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 22%;
        }
        .registration-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 14px;
        }
        .form-group label i{
            font-size: 15px;
            margin-right: 4px;
        }
        
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input:focus {
            border-color: #f6412d;
            outline: none;
        }
        .form-actions {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            padding-top: 20px;
        }
        .submit-btn {
            padding: 10px 12px;
            background-color: #f6412d;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-right: 10px;
        }
        .submit-btn:hover {
            opacity: 0.8;
        }
        .login-link {
            text-decoration: none;
            color: #f6412d;
            font-size: 16px;
        }
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="registration-form">
        <h2>Đăng Nhập</h2>
        <form action="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=account&action=login_handle" method="post">
            <div class="form-group">
                <label for="email"><i class="fa-regular fa-envelope"></i>Email</label>
                <input type="email" id="email" name="email" required placeholder="email@gmail.com">
            </div>
            <div class="form-group">
                <label for="password"><i class="fa-solid fa-lock"></i>Mật Khẩu</label>
                <input type="password" id="password" name="password" required placeholder="user#123">
            </div>
            <div class="form-actions">
                <button type="submit" class="submit-btn" name="login">Đăng Nhập</button>
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=account&action=register" class="login-link">Đăng ký</a>
            </div>
            <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=account&action=forget_pass" 
                style="margin-top: 35px;
                    display:block;
                    padding-bottom: 10px;
                    text-decoration: none;
                    font-size: 14px;
                    color: #444;">
            quên mật khẩu ?</a>
        </form>
    </div>
</body>
</html>
