<?php

namespace Model;

class Product extends ActiveRecord{

    protected static $tabla = 'products';
    protected static $columnasDB = ['id', 'name', 'price', 'image', 'description', 'weight', 'length', 'created', 'salespeople_id']; 

    public $id;
    public $name;
    public $price;
    public $image;
    public $description;
    public $weight;
    public $length;
    public $created;
    public $salespeople_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;   
        $this->name = $args['name'] ?? '';   
        $this->price = $args['price'] ?? '';   
        $this->image = $args['image'] ?? '';   
        $this->description = $args['description'] ?? '';   
        $this->weight = $args['weight'] ?? '';   
        $this->length = $args['length'] ?? '';      
        $this->created = date('Y-m-d');   
        $this->salespeople_id = $args['salespeople_id'] ?? '';   
    }


     public function validar(){
        
         if(!$this->name){
             self::$alertas[] = "You must add a name";
         }

         if(!$this->price){
             self::$alertas[] = "The price is mandatory";
         }

         if(strlen($this->description) < 50){
             self::$alertas[] = "The description is mandatory and should be at least 50 characters long";
         }

         if(!$this->weight){
             self::$alertas[] = "Weight is mandatory";
         }
         if(!filter_var($this->weight, FILTER_VALIDATE_FLOAT)){
            self::$alertas[] = "Invalid format for weight";
         }

         if(!$this->length){
             self::$alertas[] = "Length is mandatory";
         }
         if(!filter_var($this->length, FILTER_VALIDATE_FLOAT)){
            self::$alertas[] = "Invalid format for length";
         }

         if(!$this->salespeople_id){
             self::$alertas[] = "Choose a seller";
         }

         if(!$this->image){
             self::$alertas[] = "You must add an image";
         }

         return self::$alertas;
     }

}
