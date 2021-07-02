<?php
class Database
{
    public $connection;

    public function __construct(){
            $this->db_connect();
    }    
    public function db_connect(){
        $this->connection = mysqli_connect('localhost','root','','ooppractice');
        if(mysqli_connect_error()){
            die("Could not connect");
        }
        // else {echo "Connected";}    
    }
    public function check($a){
        $return = mysqli_real_escape_string($this->connection,$a);
        return $return;}
}
?>