<?php
//Create public class category
//method
class Category{
    //declare private variables
    private $id;
    private $name;

    //create public constructor
    public function __construct($id, $name){
        //this refernces "this" class
        //makes the class variable available within the constructor
        $this->id = $id;
        $this->name = $name;
    }

    //Gets ID value of the ID variable 
    public function getID(){
        //returns the value of $id from the class
        return $this->id;
    }

    //Sets ID value, resets the value of ID to whatever "value" is passed to the function
    public function setID($value){
        $this->id = $value;
    }
    
    //Gets Name value
    public function getName(){
        return $this->name;
    }

    //Sets Name value
    public function setName($value){
        $this->name = $value;
    }

}

?>