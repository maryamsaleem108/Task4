<?php
//4. Create a route to read data

//Routes:
//1. To Get All Inventory: http://localhost/php_practice/Task_4/readData.php?id
//2. To Get Specific Inventory: http://localhost/php_practice/Task_4/readData.php?id=(id Number)

include "connection.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $db = new databaseConnect("localhost","inventory", "root", "");
//  if the id is provided then we will return only specific inventory
    if (isset($_GET) && $_GET['id'] != "") {
        $id = $_GET['id'];
        $sql = "SELECT * FROM stock WHERE ID = {$id}";
        $result = mysqli_query($db->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
        }

//  otherwise, we will return all inventory data
    }else if (isset($_GET) && $_GET['id'] == "") {
        $sql = "SELECT * FROM stock";
        $result = mysqli_query($db->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
        }
    }else{
        echo json_encode(array('message'=>'Data Not Found!','status'=>false));
    }
}else{
    echo json_encode(array('message'=>'Use Get Method ','status'=>false));
}
mysqli_close($db->conn);
?>