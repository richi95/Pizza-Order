<?php

$conn = mysqli_connect("localhost", "root", "10a@60bv", "pizza_shop");

if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$select_products = "SELECT id, name, price, image, size FROM products";

$result = $conn->query($select_products);

// while($row= $result->fetch_assoc()) { 
//   $id=$row['id']; 
//   $name=$row['name']; 
//   $price=$row['price']; 
//   $image=$row['image']; 

//   $products[] = array('id'=> $id, 'name'=> $name, 'price' => $price, 'image'=>$image);
// } 

// $response['products'] = $products;

// $fp = fopen('pizzas.json', 'w');
// fwrite($fp, json_encode($response));
// fclose($fp);

// $conn->close();

