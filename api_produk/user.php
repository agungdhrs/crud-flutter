<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $password;
    public $user_type;

    public function __construct($db){
        $this->conn = $db;
    }

    function login(){
        $query = "SELECT id, user_type, password FROM " . $this->table_name . " WHERE username = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $this->username=htmlspecialchars(strip_tags($this->username));
        $stmt->bindParam(1, $this->username);
        $stmt->execute();

        $num = $stmt->rowCount();
        if($num > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->user_type = $row['user_type'];
            $password_hash = $row['password'];

            if(password_verify($this->password, $password_hash)){
                return true;
            }
        }
        return false;
    }
}
?>
