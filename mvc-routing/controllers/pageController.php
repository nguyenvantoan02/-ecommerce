<?php
session_start();
require_once('controllers/baseController.php');
require_once('./models/product.php');
class pageController extends BaseController
{
  function __construct()
  {
    $this->folder = null;
  }

  public function about()
  {

    $this->render('about');
  }

  public function address()
  {

    $this->render('address');
  }

  public function address_handle()
  {
    if(isset($_POST['address']) && isset($_POST['phone_number']) && isset($_POST['user_id'])){
      $address = $_POST['address'];
      $phone_number = $_POST['phone_number'];
      $user_id = $_POST['user_id'];
      $result = product::insert_address($address,$phone_number,$user_id);
      if($result > 0){
        header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home');
      }else{
        exit;
      }
    }
  }

  public function detail()
  {

    $this->render('detail');
  }

  public function test()
  {

    $this->render('test');
  }

  public function historyByProduct()
  {
    $data =[
      'sanpham' => product::ShowHistory()
    ]; 
    $this->render('historyByProduct', $data);
  }

  public function computer()
  {
    if(isset($_GET['page'])){
      $page = $_GET['page'];
      $data = [
        'products'=> product::page_computer($page)
      ];
      $this->render('computer', $data);
    }else{
      $data = [
        'products'=> product::page_computer(1)
      ];
      $this->render('computer',$data);
    // }
  }

  }

  public function tv()
  {
    if(isset($_GET['page'])){
      $page = $_GET['page'];
      $data = [
        'products'=> product::page_tv($page)
      ];
      $this->render('tv', $data);
    }else{
      $data = [
        'products'=> product::page_tv(1)
      ];
      $this->render('tv',$data);
    // }
  }
  }

  public function watch()
  {
    if(isset($_GET['page'])){
      $page = $_GET['page'];
      $data = [
        'products'=> product::page_watch($page)
      ];
      $this->render('watch', $data);
    }else{
      $data = [
        'products'=> product::page_watch(1)
      ];
      $this->render('watch',$data);
    // }
  }
  }

  public function personal_information()
  {
    $this->render('personal_information');
  }

  public function phone()
  {
    if(isset($_GET['page'])){
      $page = $_GET['page'];
      $data = [
        'products'=> product::page_phone($page)
      ];
      $this->render('phone', $data);
    }else{
      $data = [
        'products'=> product::page_phone(1)
      ];
      $this->render('phone',$data);
    // }
  }
  }

  


  public function error()
  {
    $this->render('error');
  }
}