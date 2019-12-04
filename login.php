<?php
include('config.php');

class login{
    private $login

    public function __construct(){
        $this->login = new mysqli("192.168.1.21", "admin", "password", "users");
        $this->queue_declare('sql', 'false','true','false','false');
        if($this->login->connect_errno != 0){
            
        }
    }

    public function validateLogin($username, $password){
        $user = $this->login->real_escape_string($username);
        $pass = $this->login->real_escape_string($password);
        $sql = "SELECT * FROM login WHERE username = '$user';";
        $response = $this->login->query($sql);
        while ($row = $response->fetch_assoc()){
            if($row["password"] == $pass){
                return true;
            } else return false;
        }
    }
}
?>