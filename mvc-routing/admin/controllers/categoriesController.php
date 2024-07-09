<?php
require_once('controllers/baseController.php');
require_once('../models/category.php');

class categoriesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'categories';
  }

  public function index()
  {
    $data = [
      'categories'=>category::categories()
    ];
    $this->render('index',$data);
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
       category::delete($id);
       header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=categories&action=index');
    }
    
  }else if(isset($_POST['cancel'])){
    header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=categories&action=index');
  }
  }

  public function create()
  {
    $this->render('create');
  }

  public function create_handle()
  {
    if(isset($_POST['category_name'])){
      $name = $_POST['category_name'];
      if(strlen($name) < 2){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=categories&action=index');
        exit;
      }
      $result = category::addCategory($name);
      if($result > 0){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=categories&action=index');
      }
    }
  }

  public function update()
  {
    $this->render('update');
  }

  public function update_handle()
  {   
    if(isset($_POST['id']) && isset($_POST['cate_name']) && isset($_POST['time'])){
      $category_id = $_POST['id'];
      $cate_name = $_POST['cate_name'];
      $time_create = $_POST['time'];

      if(strlen($cate_name) < 2) {
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=categories&action=index');
        exit;
      }
  
        $result = category::update_acc(new category($cate_name, $time_create, $category_id));
        if($result > 0){
          header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=categories&action=index');
        }else{
          echo 'no';
        } 
    }else{
      echo 'dữ liệu không tìm thấy';
    }
  }


}