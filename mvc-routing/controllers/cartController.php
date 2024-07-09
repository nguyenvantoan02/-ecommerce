<?php
session_start();
require_once('controllers/baseController.php');
require_once('models/cart.php');
require_once('models/order.php');


class cartController extends BaseController
{
  function __construct()
  {
    $this->folder = null;
  }

  public function register()
  {
    $this->render('register');
  }

  public function cart_order_handle(){
    if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['category_id']) && isset($_POST['price_new']) && isset($_POST['infor']) && isset($_POST['img'])  && isset($_POST['quantity'])){
        $p_id = $_POST['id'];
        $name= $_POST['name'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price_new'];
        $information= $_POST['infor'];
        $img = $_POST['img'];
        $quantity = $_POST['quantity'];
        $user_id = $_SESSION['user_id'];
        if(isset($_POST['add_cart'])){
            $result = cart::insert_cart(new cart($name,$price,$img,$user_id,$category_id,$p_id,$information));
            if($result > 0){
               header('location:http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=cart&action=cart');
            }

        }else if(isset($_POST['add_order'])){
          $name_customer = $_SESSION['username'];
          $email_customer = $_SESSION['email'];
          $conn = mysqli_connect('localhost','root','123456','php2');
          $select="SELECT address, phone_number FROM address WHERE user_id = $user_id";
          $stmt = $conn->query($select);
          
          if ($stmt->num_rows > 0) {
              $row = $stmt->fetch_array();
              $phone = $row['phone_number'];
              $address = $row['address']; 
      
              $_SESSION['phone'] = $phone;
              $_SESSION['address'] = $address;
      
              $result = order::insert_order_detail(new order($name_customer, $email_customer, $phone, $address, "chờ xác nhận", $user_id, $category_id, $p_id), $price, $quantity);
              
              if ($result > 0) {
                header('location:http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=historyByProduct');
              }
          } else {
              header('location:http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=address');
          }
        }

    }
  }

  public function cart()
    {

        $data = [
            'cart' => cart::carts()
        ];
        $this->render('cart',$data);
    }

    public function order()
    {

        $data = [
            'cart' => order::carts()
        ];
        $this->render('cart',$data);
    }
}