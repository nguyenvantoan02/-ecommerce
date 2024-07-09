<?php
    require 'database.php' ;
    class account{
        public $user_id;
        public $time_create;
        private $username;
        private $email;
        private $password;
        private $code_acc;
        public static $conn;

        public function __construct($username=' ', $email=' ', $password=' ', $code_acc=' ', $user_id=' ', $time_create=' '){
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->user_id = $user_id;
            $this->time_create = $time_create;
            $this->code_acc = $code_acc;
            
        }
        //
        public function setUsername($username){
            $this -> username = $username;
        }
        public function getUsername(){
            return $this -> username;
        }
        //
        public function setEmail($email){
            $this -> email = $email;
        }
        public function getEmail(){
            return $this -> email;
        }
        //

        public function setCode_acc($code_acc){
            $this -> code_acc = $code_acc;
        }
        public function getCode_acc(){
            return $this -> code_acc;
        }
        //
        public function setPassword($password){
            $this -> password = $password;
        }
        public function getPassword(){
            return $this -> password;
        }

//////////////////////////////////////
        public static function accounts(){
            $acc= [];
            $db = new db\database();
            account::$conn = $db->connect();
            $select = 'SELECT * FROM accounts';
            $stmt =  account::$conn->query($select);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $acc[] = new account($row['username'],$row['email'],$row['password'],$row['code_acc'],$row['user_id'],$row['time_create']);
            }
            return $acc;
        }

        public static function delete($id){
            $db = new db\database();
            self::$conn = $db->connect();

            // Xóa từ bảng detail trước
            $selectDetail = "DELETE FROM detail WHERE order_id IN (SELECT order_id FROM products_orders WHERE user_id = :id)";
            $stmtDetail = self::$conn->prepare($selectDetail);
            $stmtDetail->bindValue(':id', $id, PDO::PARAM_INT);
            $stmtDetail->execute();

        
            $selectAddress = "DELETE FROM address WHERE user_id = :id";
            $stmtAddress = self::$conn->prepare($selectAddress);
            $stmtAddress->bindValue(':id', $id, PDO::PARAM_INT);
            $stmtAddress->execute();
        
            $selectProducts_orders = "DELETE FROM products_orders WHERE user_id = :id";
            $stmtProducts_orders = self::$conn->prepare($selectProducts_orders);
            $stmtProducts_orders->bindValue(':id', $id, PDO::PARAM_INT);
            $stmtProducts_orders->execute();
        
            $selectContacts = "DELETE FROM contacts WHERE user_id = :id";
            $stmtContacts = self::$conn->prepare($selectContacts);
            $stmtContacts->bindValue(':id', $id, PDO::PARAM_INT);
            $stmtContacts->execute();
        
            $selectComments = "DELETE FROM comments WHERE user_id = :id";
            $stmtComments = self::$conn->prepare($selectComments);
            $stmtComments->bindValue(':id', $id, PDO::PARAM_INT);
            $stmtComments->execute();
        
            $selectCart = "DELETE FROM cart WHERE user_id = :id";
            $stmtCart = self::$conn->prepare($selectCart);
            $stmtCart->bindValue(':id', $id, PDO::PARAM_INT);
            $stmtCart->execute();
        
            $select = "DELETE FROM accounts WHERE user_id = :id";
            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        

        public static function update_acc($obj){
            try{
                $db = new db\database();
                self::$conn = $db->connect();
                $select = "UPDATE accounts SET username = :username, email = :email, password = :password,code_acc = :code_acc, time_create = :time_create WHERE user_id = :user_id";
                $stmt = self::$conn->prepare($select);
                $stmt->bindValue(':username', $obj->getUsername());
                $stmt->bindValue(':email', $obj->getEmail());
                $stmt->bindValue(':password', $obj->getPassword());
                $stmt->bindValue(':code_acc', $obj->getCode_acc());
                $stmt->bindValue(':time_create', $obj->time_create);
                $stmt->bindValue(':user_id', $obj->user_id);
           
                $stmt->execute();
                return $stmt->rowCount();

            }catch(PDOException $e){
                $e->getMessage();
            }

        }

        public static function create_acc($obj){
            $db = new db\database();
            self::$conn = $db->connect();
            $select = "INSERT INTO accounts (username, email, password,code_acc) VALUES(:username,:email,:password,:code_acc)";
            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':username',$obj->getUsername());
            $stmt->bindValue(':email',$obj->getEmail());
            $stmt->bindValue(':password',$obj->getPassword());
            $stmt->bindValue(':code_acc',$obj->getCode_acc());
            $stmt->execute();
            return $stmt->rowCount();
        }

        public static function email_exits($email){
            $db = new db\database();
            self::$conn = $db->connect();
            $select = "SELECT * FROM accounts WHERE email = :email";

            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':email',$email);
            $stmt->execute();

            return $stmt->rowCount();
        }

        public static function password_exits($email){
            $db = new db\database();
            self::$conn = $db->connect();
            $select = "SELECT password FROM accounts WHERE email = :email";

            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':email',$email);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['password'];
        }

        
        public static function username_exits($email){
            $db = new db\database();
            self::$conn = $db->connect();
            $select = "SELECT username FROM accounts WHERE email = :email";

            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':email',$email);
            $stmt->execute();   

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['username'];
        }

        public static function userid_exits($email){
            $db = new db\database();
            self::$conn = $db->connect();
            $select = "SELECT user_id FROM accounts WHERE email = :email";

            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':email',$email);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['user_id'];
        
        }


        
        

        public static function forget_account($email){
            $db = new db\database();
            self::$conn = $db->connect();
            $select="SELECT code_acc FROM accounts WHERE email = '$email'";
            $stmt = self::$conn->query($select);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $result_main = $result['code_acc'];
            return $result_main;
        }

        
    }

    
?>