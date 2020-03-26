<?php
//ggg
$webservername = $_SERVER["SERVER_NAME"];
$http_method = $_SERVER["REQUEST_METHOD"];
$http_query = $_SERVER["QUERY_STRING"];

echo json_encode($webservername);
return;

$myObj = new stdClass();
$myObj->productList = array();



$servername = "visitacivitavecchia_db_1";
$username="user";
$password="password";
$dbname="db";
$conn= new mysqli($servername,
              $username,
              $password,
              $dbname);

if($conn->connection_error){
    die("connection field: ".$conn->connection_error);
}

$result = $conn->query("SELECT product, price FROM `products`");

if($result->num_rows>0){
    foreach($result as $row){
        $prod = new stdClass();
        $prod->product = $row["product"];
        $prod->price = $row["price"];
        $myObj->productList[] = $prod;
    }
}


echo json_encode($myObj);

?>