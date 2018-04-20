<?php
require('../model/product_db.php');
require('../model/category_db.php');

//Checking to see if value is incuded in the POST value "action"
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
} 

if ($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $categories = get_categories();
    $category_name = get_category_name($category_id);
    $products = get_products_by_category($category_id);
    //Calls the view related to this data set kinda like a redirect 
    //but handled on the server side instead of sending the redirect bact to the browser
    include('product_list.php');//view page
} 
else if ($action == 'view_product') {
    $product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);   
    if ($product_id == NULL || $product_id == FALSE) {
        $error = 'Missing or incorrect product id.';
        include('../errors/error.php');
    } else {
        $categories = get_categories();
        $product = get_product($product_id);

        // Get product data
        $code = $product->getCode();
        $name = $product->getName();
        $list_price = $product->getPrice();

        // Calculate discounts
        $discount_percent = $product->getDiscountPercent();

        // Format the calculations
        $discount_amount_f = $product->getDiscountPercent();
        $unit_price_f =  $product->getDiscountPrice();

        // Get image URL and alternate text
        $image_filename = $product->getImagePath();
        $image_alt = $product->getImageAltText();

        include('product_view.php');
    }
}