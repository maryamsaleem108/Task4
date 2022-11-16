<?php
//1. Create a route to insert data
//Routes: http://localhost/php_practice/Task_4/insertData.php

//------------ To Test, Enter Following Data in Request Body
//{
//    "Name":"Oreo",
//    "Quantity": "600",
//    "Price" : "20",
//    "Category":"Snacks"
//}



include "connection.php";
$data = json_decode(file_get_contents("php://input"),true);
$name = $data['Name'];
$quantity = $data['Quantity'];
$price = $data['Price'];
$category = $data['Category'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $db = new databaseConnect("localhost","inventory", "root", "");
    $sql = "INSERT INTO stock(NAME,QUANTITY,PRICE,CATEGORY) VALUES ('{$name}',{$quantity},'{$price}','{$category}')";
    if(mysqli_query($db->conn,$sql)){
        echo json_encode(array('message'=>'Data Inserted Successfully!','status'=>true));
    }else{
        echo json_encode(array('message'=>'Data Not Inserted!','status'=>false));
    }
}else{
    echo json_encode(array('message'=>'Use POST Method ','status'=>false));
}
mysqli_close($db->conn);
?>