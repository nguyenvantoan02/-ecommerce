<?php 
    class contact{
        public $email, $tel, $content, $user_id, $contact_id, $time_create;
        public static $conn = null;

        public function __construct($email='', $tel='', $content='', $user_id='', $contact_id='', $time_create=''){
            $this->email = $email;
            $this->tel = $tel;
            $this->content = $content;
            $this->user_id = $user_id;
            $this->contact_id = $contact_id;
            $this->time_create = $time_create;
        }

        public static function add($obj){
            $db = new db\database();
            self::$conn = $db->connect();
            $select = "INSERT INTO contacts(email,tel,content,user_id) VALUES(:email,:tel,:content,:user_id)";
            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':email',$obj->email);
            $stmt->bindValue(':tel',$obj->tel);
            $stmt->bindValue(':content',$obj->content);
            $user_id = $_SESSION['user_id'];
            $stmt->bindValue(':user_id', $user_id);
            $stmt->execute();
            return $stmt->rowCount();
        }
        public static function contacts(){
            $db = new db\database();
            self::$conn = $db->connect();
            $arr = [];
            $select = "SELECT * FROM contacts";
            $stmt = self::$conn->query($select);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $arr[] = new contact($row['email'], $row['tel'],$row['content'],$row['user_id'] ,$row['contact_id'],$row['time_create']);
            }
            return $arr;
            
        }

        public static function delete_contact($id){
            $db = new db\database();
            self::$conn = $db->connect();
            $select = "DELETE FROM contacts WHERE contact_id = :contact_id";
            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':contact_id',$id);
            $stmt->execute();
            return $stmt->rowCount();
        }

       

    }


?>