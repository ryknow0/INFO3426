<?php

//Create a public class Product
class Product{
    //Declare private variables
    private $category;
    private $category_id;
    private $id;
    private $code;
    private $name;
    private $price;
    

    //Class constructor
    public function __construct($category, $category_id, $id, $code, $name, $price){
        $this->category = $category;
        $this->category_id = $category_id;
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;

    }
    //Declare class methods
    //Function usually has a return value
    //Gets category value
    public function getCategory(){
        return $this->category;
    }
    //Assigns value passed to function to the variable
    public function setCategory($value){
        $this->category = $value;
    }

    public function getCategoryID(){
        return $this->category;
    }
    public function setCategoryID($value){
        $this->category_id=$value;
    }
    public function getID(){
        return $this->id;
    }
    public function setID($value){
       $this->id = $id; 
    }
    public function getCode(){
        return $this->code;
    }
    public function setCode($value){
        $this->code = $value;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($value){
        $this->name = $value;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($value){
        $this->price = $value;
    }

    public function getFormattedPrice(){
        //calling number_format method and passing price then 
        //return the value
        $formatted_price = number_format($this->price,2);
        return $formatted_price;
    }
    public function getDiscountPercent(){
        $discount_percent = 30;
        return $discount_percent;
    }
    public function getDiscountAmount(){
        $discount_percent = $this->getDiscountPercent()/100;
        $discount_amount = $this->price * $discount_percent;
        $discount_amount_r = round($discount_amount, 2);
        $discount_amount_f = number_format($discount_amount_r,2);
        return $discount_amount_f;
    }
    public function getDiscountPrice(){
        $discount_price = $this->price - $this->getDiscountAmount();
        $discount_price_f = number_format($discount_price, 2);
        return $discount_price_f;

    }
    public function getImageFilename(){
        $image_filename = $this->code . '.png';
        return $image_filename;
    }
    public function getImagePath(){
        $image_path = '../images/' . $this->getImagefilename();
        return $image_path;
    }
    public function getImageAltText(){
        return 'Image: ' . $this->getImageFilename();
    }
    public function update($category, $category_id, $code, $name, $price){
        $this->category = $category;
        $this->category_id = $category_id;
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }
}