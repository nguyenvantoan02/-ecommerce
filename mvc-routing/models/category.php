<?php
    require 'database.php';
    class Category {
        public $category_id;
        public $category_name;
        public $time_create;

        public static $conn;
    
        public function __construct($category_name, $time_create = '', $category_id = '') {
            $this->category_name = $category_name;
            $this->time_create = $time_create;
            $this->category_id = $category_id;
        }

        public static function categories(){
            $acc= [];
            $db = new db\database();
            Category::$conn = $db->connect();
            $select = 'SELECT * FROM categories';
            $stmt =  Category::$conn->query($select);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $acc[] = new Category($row['category_name'],$row['time_create'],$row['category_id']);
            }
            return $acc;
        }

        public static function delete($id){
            $db = new db\database();
            self::$conn = $db->connect();
            $select = "DELETE FROM products WHERE category_id IN (SELECT category_id FROM categories WHERE category_id = :id)";
            $stmt_pr = self::$conn->prepare($select);
            $stmt_pr->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt_pr->execute();

            
            $select = "DELETE FROM categories WHERE category_id = :id";
            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }

        public static function update_acc($obj){
            try{
                $db = new db\database();
                self::$conn = $db->connect();
                $select = "UPDATE categories SET category_id = :category_id, category_name = :category_name, time_create = :time_create WHERE category_id= :category_id";
                $stmt = self::$conn->prepare($select);
                $stmt->bindValue(':category_name', $obj->category_name);
                $stmt->bindValue(':time_create', $obj->time_create);
                $stmt->bindValue(':category_id', $obj->category_id);
           
                $stmt->execute();
                return $stmt->rowCount();

            }catch(PDOException $e){
                $e->getMessage();
            }

        }

        public static function addCategory($category_name) {
            $db = new db\database();
            self::$conn = $db->connect();
            $sql = "INSERT INTO php2.categories (category_name) VALUES (:category_name)";
    
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':category_name', $category_name);
            $stmt->execute();
    
            return $stmt->rowCount();
         
        }


    }
?>