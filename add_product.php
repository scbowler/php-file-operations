<?php
$directory = 'products/';

if(!empty($_GET['product-type'])){
    $file_name = $_GET['product-type'];
} else {
    $file_name = 'cupcakes';
}

$full_path = $directory.$file_name.'.php';


echo '<pre>';
print_r($_POST);
echo '</pre>';

if(!empty($_POST['name'])){
    $product_name = $_POST['name'];
} else {
    echo '<h1>No product name provided</h1>';

    exit;
}
// Checking if cost exists and that it is a number
if(!empty($_POST['cost']) && is_numeric($_POST['cost'])){
    $product_cost = (int) $_POST['cost'];
} else {
    echo '<h1>No valid cost given</h1>';

    exit;
}

// $number = '123'; // $_POST['cost]

// $isNumber = is_numeric($number);

// echo "<h1>Our Number Is: $number</h1>";
// echo "<h1>Is Number: $isNumber</h1>";

// exit;

// Temp Dummy Data
$product_id = time();

if(file_exists($directory)){ //
    echo "<h1>Found the $directory directory</h1>";
} else {
    echo "<h1>Directory not found, creating $directory</h1>";

    mkdir($directory);//
}

$products = [];

if(file_exists($full_path)){ //
    // Found File, read data from file
    // Set contents of file to $products
    echo '<h1>Found existing products</h1>';

    $file_size = filesize($full_path); //

    if($file_size) {
        $product_file = fopen($full_path, 'r'); //

        $file_contents = fread($product_file, $file_size); //

        $products = json_decode($file_contents, true);

        echo '<pre>';
        print_r($products);
        echo '</pre>';
    }

    echo "<h1>File Size: $file_size</h1>";
}

$products[$product_id] = [
    'name' => $product_name,
    'cost' => $product_cost
];

$product_file = fopen($full_path, 'w');

fwrite($product_file, json_encode($products));

echo '<h1>New product added successfully</h1>';
