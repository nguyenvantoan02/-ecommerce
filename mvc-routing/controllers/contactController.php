<?php
session_start();
require_once('controllers/baseController.php');
require_once('models/contact.php');
require_once('models/account.php');



class contactController extends BaseController
{
  function __construct()
  {
    $this->folder = null;
  }

  public function add_contacts()
  {
    if(isset($_POST['Email']) && isset($_POST['Phone']) && isset($_POST['content'])){
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $content = $_POST['content'];
        // echo $email . $Phone .$content;
        if(!filter_var($email,FILTER_VALIDATE_EMAIL) ||  strlen($phone) < 10 ||  strlen($phone) > 10 || strlen($content) < 2){
          header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home');
          exit;
        }
        $check_email_exists = account::email_exits($email);
        if($check_email_exists > 0){
          $result = contact::add(new contact($email,$phone,$content));
          if($result > 0){
            echo "<script>alert('Thêm liên hệ thành công')</script>";
            header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home');

          }else{
            echo "<script>alert('Thêm liên hệ không thành công, tài khoản yêu cầu chưa tồn tại')</script>";
             header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home');
            

          }

        }else{
          echo "<script>alert('Tài khoản liên quan đến email chưa tồn tại')</script>";
          header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home');
          exit;
        }
    }else{
      echo "<script>alert('Dữ liệu không tồn tại')</script>";
    }
    
    
  {
    

  }

 
}
}