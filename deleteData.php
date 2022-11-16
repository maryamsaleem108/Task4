<?php
//3. Create a route to delete data
//Route: http://localhost/php_practice/Task_4/deleteData.php

//------------ To Test, Enter Following Data in Request Body
//{
//    "Id":13
//}

include "connection.php";
$data = json_decode(file_get_contents("php://input"),true);
$id = $data['Id'];

if ($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "DELETE") {
    $db = new databaseConnect("localhost","inventory", "root", "");
    $sql = "DELETE FROM stock WHERE id = {$id}";
    if(mysqli_query($db->conn,$sql)){
        echo json_encode(array('message'=>'Data Deleted Successfully!','status'=>true));
    }else{
        echo json_encode(array('message'=>'Data Not Deleted!','status'=>false));
    }
}else{
    echo json_encode(array('message'=>'Use POST or DELETE Method ','status'=>false));
}
mysqli_close($db->conn);
?>