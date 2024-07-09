<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input:focus {
            border-color: #007BFF;
            outline: none;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST['email_reset']) && isset($_POST['code_reset'])){
            $conn = mysqli_connect('localhost','root','123456','php2');

            $email = $_POST['email_reset'];
            $code = $_POST['code_reset'];

            $select= "SELECT code_acc FROM accounts WHERE email = '$email'";
            $stmt = $conn->query($select);
            $result = $stmt->fetch_array();
            $result_main = $result['code_acc'];
            if($result_main == $code){
    ?>

<div class="form-container">
    <h2>Reset Password</h2>
    <form action="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=account&action=reset_acc2" method="POST">
        <div class="error" id="error-message"></div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email_confirm"  value="<?php echo $email;?>"required>
        </div>
        <div class="form-group">
            <label for="password"> Create New Password</label>
            <input type="password" id="password" name="password_confirm" required>
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" required>
        </div>
        <div class="form-group">
            <button type="submit">Reset Password</button>
        </div>
    </form>
    <?php }}?>
</div>

<?php 
    if(isset($_POST['email_confirm']) && isset($_POST['password_confirm']) && isset($_POST['confirm_password'])){
        $conn = mysqli_connect('localhost','root','123456','php2');

        $email = $_POST['email_confirm'];
        $password = $_POST['password_confirm'];
        $password_again = $_POST['confirm_password'];
        if($password == $password_again){
            $select="UPDATE accounts SET password = '$password' WHERE email = '$email'";
            $stmt = $conn->query($select);
            if($stmt){
                echo"<script>
                    alert('Cập nhật thông tin thành công hihihi');
                </script>";
                header('location:http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=account&action=login');
    
            }else{
                echo"<script>
                    alert('Cập nhật thông tin chưa thành công');
                </script>";
            }
        }
    }
?>

</body>
</html>
