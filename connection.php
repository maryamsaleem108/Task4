<?php
header('Content-Type: application/json'); //which type of data will return
header('Access-Control-Allow-Origin: *'); //who can access this API, * means any website can access
class databaseConnect{
    public $conn;
    public function __construct($host,$dbname,$username,$password){
        $connection = mysqli_connect($host,$username,$password,$dbname) or die("Connection Failed");
        $this->conn = $connection;
//        $conn = new PDO('mysql:host = '.$host.';dbname ='.$dbname.';',$username,$password);
//        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//        $this->pdo = $conn;
    }

//    public function query($q){
//        $result = mysqli_query($this->conn,$q) or die("ERROR");
////        $this->res = $result;
//        return $result;
//
////        $statement = $this->pdo->prepare($q);
////        $statement->execute();
////        $data = $statement->fetchAll();
////        return $data;
//    }
}
?>