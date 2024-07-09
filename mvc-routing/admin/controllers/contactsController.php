<?php
require_once('controllers/baseController.php');
require_once('../models/contact.php');
require_once('../models/database.php');

class contactsController extends BaseController
{
  function __construct()
  {
    $this->folder = 'contacts';
  }

  public function index()
  {
    $data = [
      'contacts' => contact::contacts()
    ];
    $this->render('index', $data);
  }

  public function delete()
  {
    $this->render('delete');
  }

  public function feedback()
  {
    $this->render('feedback');
  }

  public function feedback_handle()
  {
    if(isset($_POST['email']) && isset($_POST['feedback'])){
      $email = $_POST['email'];
      $feedback = $_POST['feedback'];

      require("../models/PHPMailer-master/PHPMailer-master/src/PHPMailer.php");
      require("../models/PHPMailer-master/PHPMailer-master/src/SMTP.php");
      require("../models/PHPMailer-master/PHPMailer-master/src/Exception.php");
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
      $mail->Subject = "Cảm ơn bạn đã phản hồi cho foly shop";
      $mail->Body = $feedback;
      $mail->AddAddress($email);
      $mail->CharSet = 'UTF-8';
  
      if(!$mail->Send()) {
          echo"<script>
              alert('Gửi mail không thành công');
          </script>";
          header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=contacts&action=index');
          exit;
      } else {
          echo"<script>
              alert('Gửi mail thành công');
          </script>";
          header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=contacts&action=index');
      }
    }else{
      echo"<script>
              alert('Không nhận được dữ liệu.');
      </script>";
    }
  }
  
  public function delete_handle()
  {
    if(isset($_POST['id'])){
      $id = $_POST['id'];
      if(isset($_POST['submit'])){
        $result = contact::delete_contact($id);
        if($result > 0){
          header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=contacts&action=index');
        }else{
          echo"<script>
            alert('Xóa thất bại.');
          </script>";
        }

      }else if(isset($_POST['cancel'])){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=contacts&action=index');
         
      }
        
    }
  }
}


  