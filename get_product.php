<?php

// Verify you have the correct get data
if(empty($_GET['product-type'])){
    echo '<h1>No product type specified</h1>';

    exit;
} else {
    $product_type = $_GET['product-type'];
}

if(empty($_GET['product-id'])){
    echo '<h1>No product ID specified</h1>';

    exit;
} else {
    $product_id = $_GET['product-id'];
}

// Build the file path
$full_path = "products/$product_type.php";

// check if file exists
if(file_exists($full_path)){
    // if file exists read data and convert to assoc array
    // Use $product_id to find specific product
    // if product found print it
    // if no product found print invalid product id
} else {
    // if no file print no file found

    echo '<h1>Unknown Product Type</h1>';
}
