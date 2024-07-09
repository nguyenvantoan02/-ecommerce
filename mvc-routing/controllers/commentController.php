<?php
session_start();
require_once('controllers/baseController.php');
require_once('models/comment.php');



class commentController extends BaseController
{
  function __construct()
  {
    $this->folder = null;
  }

  public function add_comments()
  {
    if(isset($_POST['content']) && isset($_POST['user_id']) && isset($_POST['user_name']) && isset($_POST['p_id'])){
        $content = $_POST['content'];
        $user_id = $_POST['user_id'];
        $user_name = $_POST['user_name'];
        $p_id = $_POST['p_id'];
        //
        $conn = mysqli_connect('localhost','root','123456','php2');
        $select = "SELECT * FROM products WHERE p_id = '$p_id'";
        $result_prd = mysqli_query($conn,$select);
        $roww = mysqli_fetch_array($result_prd);
        

        $result = comment::insert_comment(new comment($user_id, $user_name, $p_id, $content));
        if($result > 0){
            echo "<script>alert('thêm bình luận thành công')</script>";
            $redirect_url = "http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php" .
            "?controller=page&action=detail" .
            "&id=" . urlencode($roww['p_id']) .
            "&name=" . urlencode($roww['name']) .
            "&address=" . urlencode($roww['address']) .
            "&tel=" . urlencode($roww['tel']) .
            "&price_old=" . urlencode($roww['price_old']) .
            "&price_new=" . urlencode($roww['price_new']) .
            "&information=" . urlencode($roww['information']) .
            "&sell_number=" . urlencode($roww['sell_number']) .
            "&img=" . urlencode($roww['img']) .
            "&time_create=" . urlencode($roww['time_create']) .
            "&category_id=" . urlencode($roww['category_id']);

// Thực hiện redirect
header("Location: " . $redirect_url);
exit;
        }else{
            header('location: http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=detail');
        }
    } 
  }

 
}