<?php
session_start();
require_once('controllers/baseController.php');
require_once('models/account.php');

class accountController extends BaseController
{
  function __construct()
  {
    $this->folder = null;
  }

  public function register()
  {
    $this->render('register');
  }
  public function login()
  {
    $this->render('login');
  }

  public function error()
  {
    $this->render('error');
  }

  public function reset_acc()
  {
    $this->render('reset_acc');
  }

  public function reset_acc2()
  {
    $this->render('reset_acc2');
  }

  public function forget_pass()
  {
    $this->render('forget_pass');
  }


  public function register_handle()
  {  
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['code_acc'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $code_acc = $_POST['code_acc'];
      $email_exits = account::email_exits($email);
      if(strlen($username) < 6 || strlen($code_acc) < 6 || strlen($code_acc) > 12 || strlen($password) < 6 || !filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($password) > 12  || strlen($username) > 12  || $email_exits > 0){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=account&action=register');
        exit;
      }
      $result = account::create_acc(new account($username,$email,$password,$code_acc));
      if($result > 0){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=account&action=login');
      }else{
        echo 'no';
      }
    }else{
      echo'không có thông tin về tài khoản';
    }
  }

  public function login_handle()
  {  
    if(isset($_POST['email']) && isset($_POST['password'])){
      $email = $_POST['email'];
      $password = $_POST['password'];
      if(strlen($password) < 6 || !filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($password) > 12){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=account&action=login');
        exit;
        }
      $email_exits = account::email_exits($email);
      if($email_exits > 0){
        $pass = account::password_exits($email);
        $usern = account::username_exits($email);
        $user_id = account:: userid_exits($email);

      }else{
        echo "<script>alert('Tài khoản không tồn tại.')</script>";
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=account&action=login');
      }
      if(!empty($pass) && !empty($usern) && !empty($user_id)){
        $_SESSION['password'] = $pass;
        $_SESSION['username'] = $usern;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        // echo $user_id . $email . $pass . $usern;
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home');
      }else{
        echo "<script>alert('No.')</script>";
      }
    }else{
      echo "<script>alert('Không có thông tin về tài khoản.')</script>";
    }
  }


  public function forget(){
    if(isset($_POST['email'])){
      $email = $_POST['email'];
        $result = account::email_exits($email);
        if($result > 0){
          $result1 = account::forget_account($email);
          $_SESSION['email_reset']=$email;
          $_SESSION['code_reset']=$result1;

          require("./models/PHPMailer-master/PHPMailer-master/src/PHPMailer.php");
          require("./models/PHPMailer-master/PHPMailer-master/src/SMTP.php");
          require("./models/PHPMailer-master/PHPMailer-master/src/Exception.php");
          $mail = new PHPMailer\PHPMailer\PHPMailer();
          $mail->IsSMTP(); // enable SMTP
      
          $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
          $mail->SMTPAuth = true; // authentication enabled
          $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
          $mail->Host = "smtp.gmail.com";
          $mail->Port = 465; // or 587
          $mail->IsHTML(true);
          $mail->Username = "nguyenvantoan29102002@gmail.com";
          $mail->Password = "cdsuprkvkbolcsrw";//tạo một tài khoản ứng dụng
          $mail->SetFrom("nguyenvantoan29102002@gmail.com");
          $mail->Subject = "Mã khôi phục tài khoản của quý khác là.";
          $mail->Body = $result1;
          $mail->AddAddress($email);
          $mail->CharSet = 'UTF-8';
      
          if(!$mail->Send()) {
              echo"<script>
                  alert('Gửi mail không thành công');
              </script>";
              header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=account&action=login');
          } else {
              echo"<script>
                  alert('Gửi mail thành công');
              </script>";
              header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=account&action=reset_acc');
          }
        }
          
       
    }else{
      echo "không nhận được email";
    }

  }
}