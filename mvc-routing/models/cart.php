<?php session_start(); ?>
<?php 
    require 'database.php';
    class cart{
        public $cart_name; 
        public $cart_price;
        public $cart_img;
        public $category_id;
        public $p_id;
        public $user_id; 
        public $cart_information;
        public $cart_id;
        public $time_create;

        public static $conn; 

        public function __construct($cart_name='', $cart_price='', $cart_img='', $user_id='', $category_id='', $p_id='',$cart_information='', $time_create='',$cart_id=''){
            $this->cart_name = $cart_name;
            $this->cart_price = $cart_price;
            $this->cart_img = $cart_img;
            $this->user_id = $user_id;
            $this->category_id = $category_id;
            $this->p_id = $p_id;
            $this->cart_information = $cart_information;
            $this->time_create = $time_create;
            $this->cart_id = $cart_id;
        }

        public static function insert_cart($obj){
            $arr = [];
            $db = new db\database();
            self::$conn = $db->connect();
            $select = "INSERT INTO cart (
            cart_product_name,
            cart_product_price,
            cart_product_img,
            user_id,
            category_id,
            p_id,
            cart_information
            ) VALUES(
            :name,
            :price,
            :img,
            :user_id,
            :cate_id,
            :p_id,
            :cart_information)";
            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':name', $obj->cart_name);
            $stmt->bindValue(':price', $obj->cart_price);
            $stmt->bindValue(':img', $obj->cart_img);
            $stmt->bindValue(':user_id', $obj->user_id);
            $stmt->bindValue(':cate_id', $obj->category_id);
            $stmt->bindValue(':p_id', $obj->p_id);
            $stmt->bindValue(':cart_information', $obj->cart_information);
            $stmt->execute();
            return $stmt->rowCount();

        }  

        public static function carts(){
            $arr = [];
            $db = new db\database();
            self::$conn = $db->connect();
            $user_id = $_SESSION['user_id'];
            $select = "SELECT * FROM cart WHERE user_id = $user_id";
            $stmt = self::$conn->query($select);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $arr[] = $row;
            }
            return $arr;
        }

        
    }

 
?>