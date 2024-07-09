<?php
require_once('controllers/baseController.php');
require_once('../models/account.php');

class accountsController extends BaseController
{
  function __construct()
  {
    $this->folder = 'accounts';
  }

  public function index()
  {
    $data = ['acc' => account::accounts()];
    $this->render('index', $data);
  }

  public function delete()
  {
    $this->render('delete');
  }
  public function delete_handle()
  {
    if(isset($_POST['submit'])){
        if(isset($_POST['id'])){
          $id = $_POST['id'];
          echo $id;
         account::delete($id);
         header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=accounts&action=index');
      }
      
    }else if(isset($_POST['cancel'])){
      header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=accounts&action=index');
    }
  }

  public function create()
  {
    $this->render('create');
  }

  public function create_handle()
  {  
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['code_acc'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $code_acc = $_POST['code_acc'];
      $email_exits = account::email_exits($email);
      if(strlen($username) < 3 || strlen($code_acc) < 3 || strlen($code_acc) >12 || strlen($password) < 3 || !filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($password) > 12  || strlen($username) > 12  || $email_exits > 0){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=accounts&action=index');
        exit;
      }
      $result = account::create_acc(new account($username,$email,$password,$code_acc));
      if($result > 0){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=accounts&action=index');
      }else{
        echo 'no';
      }
    }
  }
  
  // }

  public function update()
  {
    $this->render('update');
  }
  public function update_handle()
  {   
    if(isset($_POST['id']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['code_acc']) && isset($_POST['time'])){  
      $id = $_POST['id'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $code_acc = $_POST['code_acc'];
      $time = $_POST['time'];
      if(strlen($username) < 3 || strlen($code_acc) < 3 || strlen($code_acc) > 12 || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 3 || strlen($password) > 12  || strlen($username) > 10) {
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=accounts&action=index');
        exit;
      }
  
        $result = account::update_acc(new account($username, $email,$password,$code_acc,$id,$time));
        if($result > 0){
          header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=accounts&action=index');
        }else{
          echo 'no';
        } 
    }else{
      echo 'dữ liệu không tìm thấy';
    }
  }
}