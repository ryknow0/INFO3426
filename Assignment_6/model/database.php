<?php
  session_start();
  require_once('product.php');
  require_once('category.php');

  //Populates the category and products in an associative array instead of quering the database
  //Assingment 4 creates teh Product and ctegory classes
    $products = array();
    $products[1] = new Product('Guitars', 1, 1, 'strat', 'Fender Stratocaster', '699.00');
    $products[2] = new Product('Guitars', 1, 2, 'les_paul', 'Gibson Les Paul', '1199.00');
    $products[3] = new Product('Guitars', 1, 3, 'sg', 'Gibson SG', '2517.00');
    $products[4] = new Product('Guitars', 1, 4, 'fg700s', 'Yamaha FG700S', '489.99');
    $products[5] = new Product('Guitars', 1, 5, 'washburn', 'Washburn D10S', '299.00');
    $products[6] = new Product('Guitars', 1, 6, 'rodriguez', 'Rodriguez Caballero 11', '415.00');
    $products[7] = new Product('Basses',  2, 7, 'precision', 'Fender Precision', '799.99');
    $products[8] = new Product('Basses',  2, 8, 'hofner', 'Hofner Icon', '499.99');
    $products[9] = new Product('Drums' ,  3, 9, 'ludwig', 'Ludwig 5-piece Drum Set with Cymbals', '699.99');
    $products[10]= new Product('Drums' ,  3, 10, 'tama', 'Tama 5-Piece Drum Set with Cymbals', '799.99');
    $_SESSION['products'] = $products;
    $_SESSION['products_loaded'] = true;
    
    $categories = array();
    $categories[1] = new Category(1, 'Guitars');
    $categories[2] = new Category(2, 'Basses');
    $categories[3] = new Category(3, 'Drums');
    $_SESSION['categories'] = $categories;
    $_SESSION['categories_loaded'] = true;
