<?php
$controllers = array(
  'home' => ['index','home'],
  'cart' => ['cart','cart_order_handle','order'],
  'page' => ['computer','test','tv','watch','phone','about','admin','personal_information','logout','detail','address','address_handle','historyByProduct'],
  'account' => ['register','login','register_handle','login_handle','forget_pass','forget','reset_acc','reset_acc2'],
  'comment' =>['add_comments'],
  'contact' =>['add_contacts']

); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'home';
  $action = 'error';
}

// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
include_once('controllers/' . $controller . 'Controller.php');
// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$class = $controller . 'Controller';
$controller = new $class;
$controller->$action();
