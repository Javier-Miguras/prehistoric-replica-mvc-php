<?php

namespace Model;

class Seller extends ActiveRecord{
    protected static $tabla = 'salespeople';
    protected static $columnasDB = ['id', 'name', 'lastname', 'phone'];

    public $id;
    public $name;
    public $lastname;
    public $phone;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->phone = $args['phone'] ?? '';
    }

    public function validar(){
        
        if(!$this->name){
            self::$alertas[] = "You must add a name";
        }

        if(!$this->lastname){
            self::$alertas[] = "You must add an lastname";
        }

        if(!$this->phone){
            self::$alertas[] = "The phone is mandatory";
        }

        if(!filter_var($this->phone, FILTER_VALIDATE_INT)){
            self::$alertas[] = "Invalid format for phone";
         }

        return self::$alertas;
    }
}