<?php
    class order{
        public $order_id;
        public $customer_name;
        public $customer_email;
        public $customer_phone_number;
        public $customer_address;
        public $status;
        public $user_id;
        public $category_id;
        public $p_id;

        public static $conn; 

        public function __construct(
            $customer_name = null,
            $customer_email = null,
            $customer_phone_number = null,
            $customer_address = null,
            $status = null,
            $user_id = null,
            $category_id = null,
            $p_id = null,
            $order_id = null
            ) {
            $this->customer_name = $customer_name;
            $this->customer_email = $customer_email;
            $this->customer_phone_number = $customer_phone_number;
            $this->customer_address = $customer_address;
            $this->status = $status;
            $this->user_id = $user_id;
            $this->category_id = $category_id;
            $this->p_id = $p_id;
            $this->order_id = $order_id;
        }

        public static function insert_order_detail($obj,$price,$quantity){{
            $arr = [];
            $db = new db\database();
            self::$conn = $db->connect();
            $select = "INSERT INTO products_orders (
                customer_name,
                customer_email,
                customer_phone_number,
                customer_address,
                status,
                user_id,
                category_id,
                p_id
            ) VALUES (
                :customer_name,
                :customer_email,
                :customer_phone_number,
                :customer_address,
                :status,
                :user_id,
                :category_id,
                :p_id
            )";
            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':customer_name', $obj->customer_name);
            $stmt->bindValue(':customer_email', $obj->customer_email);
            $stmt->bindValue(':customer_phone_number', $obj->customer_phone_number);
            $stmt->bindValue(':customer_address', $obj->customer_address);
            $stmt->bindValue(':status', $obj->status);
            $stmt->bindValue(':user_id', $obj->user_id);
            $stmt->bindValue(':category_id', $obj->category_id);
            $stmt->bindValue(':p_id', $obj->p_id);
            $stmt->execute();

            $order_id = self::$conn->lastInsertId();
            $price_total = $price * $quantity ;
            $select2 = "INSERT INTO detail(
                quantity, 
                order_id, 
                p_id, 
                total_price
            )VALUES(
                '$quantity',
                '$order_id',
                '$obj->p_id',
                '$price_total'

            )";
            $stmt = self::$conn->query($select2);
            return $stmt->rowCount();


        }  

    } 
    
    public static function orders(){
        $arr = [];
        $db = new db\database();
        self::$conn = $db->connect();
        $select = "SELECT * FROM products_orders";
        $stmt = self::$conn->query($select);
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[]=$row;
        }
        return $arr;
    }

    public static function details(){
        $arr = [];
        $db = new db\database();
        self::$conn = $db->connect();
        $select = "SELECT * FROM detail";
        $stmt = self::$conn->query($select);
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[]=$row;
        }
        return $arr;
    }

    public static function getAllProducts() {
        $arr =[];
        $db = new db\database();
        self::$conn = $db->connect();
        $select = "SELECT * FROM products";
        $stmt = self::$conn->query($select);
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $row;
        }
        return $arr;
    }

    public static function deleteProduct($product_id) {
        $db = new db\database();
        self::$conn = $db->connect();
            
        $stmt = self::$conn->prepare("DELETE FROM products WHERE p_id = :product_id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = self::$conn->prepare("DELETE FROM products_orders WHERE p_id = :product_id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = self::$conn->prepare("DELETE FROM cart WHERE p_id = :product_id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = self::$conn->prepare("DELETE FROM detail WHERE p_id = :product_id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();

       

    }

    public static function update_products($p_id, $name, $address, $tel, $price_old, $price_new, $information, $sell_number, $img, $category_id) {
        $db = new db\database();
        self::$conn = $db->connect();
        $sql = "UPDATE products 
                SET name = :name, address = :address, tel = :tel, price_old = :price_old, price_new = :price_new, 
                    information = :information, sell_number = :sell_number, img = :img, category_id = :category_id
                WHERE p_id = :p_id";
    
        $stmt = self::$conn->prepare($sql);
    
        $stmt->bindParam(':p_id', $p_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':price_old', $price_old);
        $stmt->bindParam(':price_new', $price_new);
        $stmt->bindParam(':information', $information);
        $stmt->bindParam(':sell_number', $sell_number);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':category_id', $category_id);
    
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function create_products($name, $address, $tel, $price_old, $price_new, $information, $sell_number, $img, $category_id) {
        try {
            $db = new db\database();
            self::$conn = $db->connect();
    
            $sql = "INSERT INTO products (name, address, tel, price_old, price_new, information, sell_number, img, category_id) 
                    VALUES (:name, :address, :tel, :price_old, :price_new, :information, :sell_number, :img, :category_id)";
    
            $stmt = self::$conn->prepare($sql);
    
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':price_old', $price_old);
            $stmt->bindParam(':price_new', $price_new);
            $stmt->bindParam(':information', $information);
            $stmt->bindParam(':sell_number', $sell_number);
            $stmt->bindParam(':img', $img);
            $stmt->bindParam(':category_id', $category_id);
    
            $stmt->execute();
    
            return $stmt->rowCount();
            // return $name.$address.$tel.$price_old.$price_new.$information.$sell_number.$img.$category_id;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            
        }
    }

}
?>