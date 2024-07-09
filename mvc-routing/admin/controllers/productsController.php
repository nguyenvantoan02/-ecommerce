<?php
require_once('controllers/baseController.php');
require_once('../models/order.php');
require ('../models/database.php');
class productsController extends BaseController
{
  function __construct()
  {
    $this->folder = 'products';
  }

  public function index()
  { 
    $data = [
      'orders'=> order::orders(),
      'details' => order::details(),
      'products' => order::getAllProducts()
    ];
    $this->render('index',$data);
  }

  public function delete_handle()
  { 
    if(isset($_POST['cancel'])){
      header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=index');
    }else if(isset($_POST['submit'])){
      if(isset($_POST['id'])){
        $id = $_POST['id'];
        order::deleteProduct($id);

        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=index');
      }

    }
  }

  public function delete()
  { 
    $this->render('delete');
  }

  public function update()
  { 
    $this->render('update');
  }

  public function update_handle()
  { 
    if (
      isset($_POST['p_id']) &&
      isset($_POST['name']) &&
      isset($_POST['address']) &&
      isset($_POST['tel']) &&
      isset($_POST['price_old']) &&
      isset($_POST['price_new']) &&
      isset($_POST['information']) &&
      isset($_POST['sell_number']) &&
      isset($_POST['img']) &&
      isset($_POST['category_id'])
    ) {
        $p_id = $_POST['p_id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $price_old = $_POST['price_old'];
        $price_new = $_POST['price_new'];
        $information = $_POST['information'];
        $sell_number = $_POST['sell_number'];
        $img = $_POST['img'];
        $category_id = $_POST['category_id'];
        //
        echo "p_id: $p_id<br>";
        echo "Name: $name<br>";
        echo "Address: $address<br>";
        echo "Tel: $tel<br>";
        echo "Price Old: $price_old<br>";
        echo "Price New: $price_new<br>";
        echo "Information: $information<br>";
        echo "Sell Number: $sell_number<br>";
        echo "Image: $img<br>";
        echo "Category ID: $category_id<br>";
        //
    if (strlen($name) <= 2 || strlen($address) <= 2 || strlen($tel) <= 2 || strlen($price_old) <= 2 || strlen($price_new) <= 2 || strlen($information) <= 2 || strlen($sell_number) <= 2) {
      header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=index');
      exit;
    }else{
      $result = order::update_products($p_id ,$name, $address, $tel, $price_old, $price_new, $information, $sell_number, $img, $category_id);
      if($result > 0){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=index');
      }
    }
      
    }
  }

  public function create()
  { 
    $this->render('create');
  }

  public function create_handle()
  { 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST['name'];
      $address = $_POST['address'];
      $tel = $_POST['tel'];
      $price_old = $_POST['price_old'];
      $price_new = $_POST['price_new'];
      $information = $_POST['information'];
      $sell_number = $_POST['sell_number'];
      $category_id = $_POST['category_id'];
      

    foreach ($_FILES['imgs']['name'] as $key => $n) {
        $file_name = $_FILES['imgs']['name'][$key];      
        $file_size = $_FILES['imgs']['size'][$key];       
        $file_type = $_FILES['imgs']['type'][$key];       
        $file_tmp  = $_FILES['imgs']['tmp_name'][$key];   
    
        // Xử lý file ở đây...
      $path_dir = './admin/uploads/';
      $path_file = $path_dir . $file_name;
    
      if(!move_uploaded_file($file_tmp, $path_file)){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=index');
        exit;
      }
      if (strlen($name) <= 2 || strlen($address) <= 2 || strlen($tel) <= 2 || strlen($price_old) <= 2 || strlen($price_new) <= 2 || strlen($information) < 2 || strlen($sell_number) <= 2 || strlen($path_file) <= 2) {
        echo 'no';
      }else{
        $result = order::create_products($name, $address, $tel, $price_old, $price_new, $information, $sell_number, $path_file, $category_id);
        if($result > 0){
          header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=index');
        }else{
          die('Thêm sản phẩm thất bại');
        }
        echo $result;
      }
    }
    }
  

  }
    
  
  
  
  
}