<?php
//2. Create a route to update data
//Route: http://localhost/php_practice/Task_4/updateData.php

//------------ To Test, Enter Following Data in Request Body
//{
//    "Id":13,
//    "Name":"Oreo",
//    "Quantity": "300",
//    "Price" : "25",
//    "Category":"Snacks"
//}

include "connection.php";
$data = json_decode(file_get_contents("php://input"),true);
$id = $data['Id'];
$name = $data['Name'];
$quantity = $data['Quantity'];
$price = $data['Price'];
$category = $data['Category'];

if ($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "PUT") {
    $db = new databaseConnect("localhost","inventory", "root", "");
    $sql = "UPDATE stock SET NAME = '{$name}',QUANTITY = {$quantity},PRICE = '{$price}',CATEGORY = '{$category}' WHERE ID = $id";
    if(mysqli_query($db->conn,$sql)){
        echo json_encode(array('message'=>'Data Updated Successfully!','status'=>true));
    }else{
        echo json_encode(array('message'=>'Data Not Updated!','status'=>false));
    }
}else{
    echo json_encode(array('message'=>'Use POST or PUT Method ','status'=>false));
}
mysqli_close($db->conn);
?>