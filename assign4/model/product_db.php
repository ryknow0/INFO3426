<?php
require_once('database.php');

$products = $_SESSION['products'];
$categories = $_SESSION['categories'];

function get_products() {
    global $products;
    return $products;
}

function get_products_by_category($category_id) {
    global $products;
    global $categories;
    $products_group = array();
    $category_name = $categories[$category_id]->getName();

    foreach($products as $prod){
        if($prod->getCategory() == $category_name){
            $products_group[] = $prod;
        }
    }
    return $products_group;
}

function get_product($product_id) {
    global $products;   
    return $products[$product_id];
}

function delete_product($product_id) {
    global $products;   
    $products[$product_id] = null;
    $_SESSION['products'] = $products;
}

function add_product($category_id, $code, $name, $price) {
    global $products;
    global $categories;
    $category_name = $categories[$category_id]->getName();
    $id = (count($products)+1);
    $products[$id] = new Product($category_name,$category_id, $id, $code, $name, $price);
}

function update_product($product_id, $category_id, $code, $name, $price) {
    global $products;
    global $categories;    
    if( isset($products[$product_id])  and isset($categories[$category_id]) ) {
        $category_name = $categories[$category_id]->getName();
        $products[$product_id]->update($category_name,$category_id, $code,$name,$price);
        $_SESSION['products'] = $products;
    }
}