<?php
require_once('controllers/baseController.php');
require('../models/comment.php');
class commentsController extends BaseController
{
  function __construct()
  {
    $this->folder = 'comments';
  }

  public function index()
  {
    $data = [
      'comments' => comment::getAllComments()
    ];
    $this->render('index',$data);
  }

  public function delete()
  {
    $this->render('delete');
  }

  public function delete_handle()
  {
    if(isset($_POST['id'])){
      $id = $_POST['id'];
      if(isset($_POST['submit'])){
        $result = comment::delete_comment($id);
        if($result > 0){
          header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=comments&action=index');
        }else{
          echo"<script>
            alert('Xóa thất bại.');
          </script>";
        }

      }else if(isset($_POST['cancel'])){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=comments&action=index');
         
      }
        
    }
  }

  public function create()
  {
    $this->render('create');
  }

  public function create_handle()
  {
    if(isset($_POST['user_id']) && isset($_POST['username']) && isset($_POST['p_id']) && isset($_POST['content'])){
      $user_id = $_POST['user_id'];
      $username = $_POST['username'];
      $p_id = $_POST['p_id'];
      $content = $_POST['content'];

      if(strlen($content < 2)){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=comments&action=create');
        exit;
      }
      $result = comment::insert_comment(new comment($user_id, $username,$p_id,$content));
      if($result > 0){
        echo "<script>alert('Thêm thành công')</script>";
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=comments&action=index');
      }else{
        echo "<script>alert('Thêm không thành công')</script>";
      }
    }else{
      echo "<script>alert('Không tìm thấy dữ liệu')</script>";
    }
  }

  public function update()
  {
    $this->render('update');
  }

  public function update_handle()
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $id_cmt = $_POST['id_cmt'];
      $user_id = $_POST['user_id'];
      $user_name = $_POST['user_name'];
      $p_id = $_POST['p_id'];
      $content = $_POST['content'];
      $time_create = $_POST['time_create'];
      $result = comment::update_comment(new comment($user_id, $user_name, $p_id,$content,$id_cmt,$time_create));
      if($result > 0){
        echo "<script>alert('Cập nhật dữ liệu thành công')</script>";
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=comments&action=index');
      }else{
        echo "<script>alert('Cập nhật dữ liệu thất bại')</script>";
      }
    }
  }


}