<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>admin page</title>
    <style>
            body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h3 {
            text-align: center;
            color: #333333;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #333333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .btn-submit {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            display: block;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
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
                    if(isset($_GET['ma']) && isset($_GET['username']) && isset($_GET['email']) && isset($_GET['password']) && isset($_GET['code_acc']) && isset($_GET['time_create'])){
                        $ma = $_GET['ma'];
                        $username = $_GET['username'];
                        $email = $_GET['email'];
                        $password = $_GET['password'];
                        $code_acc = $_GET['code_acc'];
                        $time_create = $_GET['time_create'];
                ?>
                <div class="container">
                    <h3>Edit Account <?php echo $ma; ?></h3>
                    <form action="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=accounts&action=update_handle" method="post">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($ma); ?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username);?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email);?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" id="password" name="password" value="<?php echo htmlspecialchars($password);?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">code</label>
                            <input type="text" id="password" name="code_acc" value="<?php echo htmlspecialchars($code_acc);?>" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="text" id="time" name="time" value="<?php echo htmlspecialchars($time_create); ?>" required>
                        </div>
                        <button type="submit" class="btn-submit">Update now</button>
                    </form>
                </div>
                <?php }else{
                    echo "không tìm thấy dữ liệu yêu cầu update";
                }; ?>
            </section>
        </div>
    </div>

</body>
</html>