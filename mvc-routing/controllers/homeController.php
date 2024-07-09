<?php
require_once('controllers/baseController.php');
require_once('./models/product.php');
class homeController extends BaseController
{
  function __construct()
  {
    $this->folder = null;
  }

  public function index()
  {
    $this->render('start');
  }
  public function home()
  {
    if(isset($_GET['page'])){
      $page = $_GET['page'];
      $data = [
        'products'=> product::page($page)
      ];
      $this->render('home', $data);
    }else{
      $data = [
        'products'=> product::page(1)
      ];
      $this->render('home',$data);
    // }
  }
}

  public function error()
  {
    $this->render('error');
  }
}

