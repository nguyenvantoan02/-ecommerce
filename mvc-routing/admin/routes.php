<?php
$controllers = array(
  'categories' => ['index', 'create','create_handle', 'update', 'update_handle', 'delete', 'delete_handle'],
  'products' => ['index', 'delete','create', 'create_handle', 'update', 'update_handle','delete_handle'],
  'contacts' => ['index', 'delete','feedback','feedback_handle','delete_handle'],
  'comments' => ['index', 'create','create_handle', 'update', 'update_handle', 'delete', 'update_handle', 'delete_handle'],
  'accounts' => ['index', 'create','create_handle', 'update', 'update_handle', 'delete','delete_handle'],
  'address' => ['index', 'create','create_handle', 'update', 'update_handle', 'delete'],
  'dashboard' => ['index'],
  
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
