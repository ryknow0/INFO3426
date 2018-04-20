<?php
require_once('database.php');

$products = $_SESSION['products'];
$categories = $_SESSION['categories'];

function get_categories() {
    global $categories;
    return $categories;    
}

function get_category_name($category_id) {
    global $categories;
    $name = '';

    if ( isset($categories[$category_id]) ) {
        $category = $categories[$category_id];
        $name = $category->getName();
    }
    return $name;
}

function get_category_id($category_name) {
    global $categories;
    $id = '';

    foreach($categories as $cat){
        if($cat->getName() == $category_name){
            $id = $cat->getID();
        }
    }
    return $id;
}

function add_category($name) {
    global $categories;
    $id = (count($categories)+1);
    $categories[$id] = new Category($id, $name);
    $_SESSION['categories'] = $categories;
}

function delete_category($category_id) {
    global $categories;
    $categories[$category_id] = null;
    $_SESSION['categories'] = $categories;
}