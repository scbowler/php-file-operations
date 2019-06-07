<?php
$directory = 'products/';

if(empty($_GET['product-type'])){
    $file_name = 'cupcakes';
} else {
    $file_name = $_GET['product-type'];
}

$full_path = $directory.$file_name.'.php';

echo '<h1>Get All Products</h1>';

if(file_exists($full_path)){
    echo '<h1>Product File Exists</h1>';

    $product_file = fopen($full_path, 'r');

    $file_contents = fread($product_file, filesize($full_path));

    $products = json_decode($file_contents, true);

    echo '<pre>';
    print_r($products);
    echo '</pre>';

} else {
    echo "<h1>No products of type $file_name found</h1>";
}
