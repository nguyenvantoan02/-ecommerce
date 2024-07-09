
<?php require_once 'database.php';?>

<?php 
    class comment{
        public  $user_id, $user_name, $p_id, $content,$id_cmt, $time_create;
        public static $conn = null;

        public function __construct($user_id='', $user_name='', $p_id='', $content='',$id_cmt='', $time_create=''){
            $this->user_id = $user_id;
            $this->user_name = $user_name;
            $this->p_id = $p_id;
            $this->content = $content;
            $this->id_cmt = $id_cmt;
            $this->time_create = $time_create;
        }

        public static function comments($p_id){
            $db = new db\database();
            self::$conn = $db->connect();
            $arr = [];

            $select = "SELECT * FROM comments WHERE p_id = '$p_id'";
            $stmt = self::$conn->query($select);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $arr[] = $row;
            }
            return $arr;
          
        }
        //
        public static function getAllComments(){
            $db = new db\database();
            self::$conn = $db->connect();
            $arr = [];

            $select = "SELECT * FROM comments";
            $stmt = self::$conn->query($select);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $arr[] = new comment($row['user_id'], $row['user_name'], $row['p_id'],$row['content'],$row['id_cmt'],$row['time_create']);
            }
            return $arr;
          
        }

        public static function insert_comment($obj){
            $db = new db\database();
            self::$conn = $db->connect();

            $select = "INSERT INTO comments(user_id, user_name, p_id, content) VALUES (:user_id, :user_name, :p_id, :content)";
            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':user_id', $obj->user_id);
            $stmt->bindValue(':user_name', $obj->user_name);
            $stmt->bindValue(':p_id', $obj->p_id);
            $stmt->bindValue(':content', $obj->content);

            $stmt->execute();

            return $stmt->rowCount();
        }

        public static function delete_comment($id){
            $db = new db\database();
            self::$conn = $db->connect();

            $select = "DELETE FROM comments WHERE id_cmt = :id_cmt";
            $stmt = self::$conn->prepare($select);
            $stmt->bindValue(':id_cmt',$id);
            $stmt->execute();
            return $stmt->rowCount();
        }

        

        
    }

?>