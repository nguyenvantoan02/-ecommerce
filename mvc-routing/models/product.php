<?php
    require('database.php');
    class product{
        public $p_id;
        public $name;
        public $address;
        public $tel;
        public $price_old;
        public $price_new;
        public $information;
        public $sell_number;
        public $img;
        public $time_create;
        public $category_id;
        public static $conn = null;

        public function __construct($p_id=' ', $name=' ', $address=' ', $tel=' ', $price_old=' ', $price_new=' ', $information=' ', $sell_number=' ', $img=' ', $time_create=' ', $category_id=' '){
            $this->P_id = $p_id;
            $this->name = $name;
            $this->address = $address;
            $this->tel = $tel;
            $this->price_old = $price_old;
            $this->price_new = $price_new;
            $this->information = $information;
            $this->sell_number = $sell_number;
            $this->img = $img;
            $this->time_create = $time_create;
            $this->category_id = $category_id;

        }


        public static function page($page){
            $arr = [];
            $db = new db\database();
            self::$conn = $db->connect();
            $limit = 20;
            $start= ($page - 1)*$limit;
            $select = "SELECT * FROM products LIMIT $start, $limit";
            $stmt = product::$conn->query($select);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $arr[] = $row;
            }
            // print_r($arr);
            return $arr;
        }

///
        public static function page_computer($page){
            $arr = [];
            $db = new db\database();
            self::$conn = $db->connect();
            $limit = 20;
            $start= ($page - 1)*$limit;
            $select = "SELECT * FROM products WHERE category_id = 2 LIMIT $start, $limit";
            $stmt = product::$conn->query($select);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $arr[] = $row;
            }
            // print_r($arr);
            return $arr;
        }

        public static function page_phone($page){
            $arr = [];
            $db = new db\database();
            self::$conn = $db->connect();
            $limit = 20;
            $start= ($page - 1)*$limit;
            $select = "SELECT * FROM products WHERE category_id = 1 LIMIT $start, $limit";
            $stmt = product::$conn->query($select);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $arr[] = $row;
            }
            // print_r($arr);
            return $arr;
        }

        public static function page_tv($page){
            $arr = [];
            $db = new db\database();
            self::$conn = $db->connect();
            $limit = 20;
            $start= ($page - 1)*$limit;
            $select = "SELECT * FROM products WHERE category_id = 3 LIMIT $start, $limit";
            $stmt = product::$conn->query($select);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $arr[] = $row;
            }
            // print_r($arr);
            return $arr;
        }

        public static function page_watch($page){
            $arr = [];
            $db = new db\database();
            self::$conn = $db->connect();
            $limit = 20;
            $start= ($page - 1)*$limit;
            $select = "SELECT * FROM products WHERE category_id = 4 LIMIT $start, $limit";
            $stmt = product::$conn->query($select);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $arr[] = $row;
            }
            // print_r($arr);
            return $arr;
        }


        public static function insert_address($address,$phone_number,$user_id){
            $db = new db\database();
            self::$conn = $db->connect();
            $select = "INSERT INTO address(address,phone_number,user_id) VALUES('$address','$phone_number','$user_id')";
            $stmt = product::$conn->query($select);
            return $stmt->rowCount();
        }

        public static function ShowHistory(){
            $db = new db\database();
            self::$conn = $db->connect();
            $user_id = $_SESSION['user_id'];
            $arr = [];
            $arr2 = [];
            $select = "SELECT * FROM products_orders WHERE user_id = '$user_id'";
            $stmt = self::$conn->query($select);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $tmp = $row['order_id'];
                $arr[]=$row;
                $select2 = "SELECT * FROM detail WHERE order_id = '$tmp'";
                $stmt1 = self::$conn->query($select2);
                while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
                    $arr2[]=$row1;
                }
            }
            $arr_container[]=$arr;
            $arr_container[]=$arr2;
            return $arr_container;            
        }


    }

?>