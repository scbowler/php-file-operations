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
    $product_file = fopen($full_path, 'r');

    $products = json_decode(fread($product_file, filesize($full_path)), 1);

    // Use $product_id to find specific product
    if(!empty($products[$product_id])){
        // if product found print it
        $product = $products[$product_id];

        echo '<h1><pre>';
        print_r($product);
        echo '</h1></pre>';
        // print json_encode($product);
    } else {
        // if no product found print invalid product id
        echo "<h1>No $product_type product found with an ID of $product_id</h1>";
    }
} else {
    // if no file print no file found

    echo '<h1>Unknown Product Type</h1>';
}
