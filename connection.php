<?php
header('Content-Type: application/json'); //which type of data will return
header('Access-Control-Allow-Origin: *'); //who can access this API, * means any website can access
class databaseConnect{
    public $conn;
    public function __construct($host,$dbname,$username,$password){
        $connection = mysqli_connect($host,$username,$password,$dbname) or die("Connection Failed");
        $this->conn = $connection;
    }
}
?>
