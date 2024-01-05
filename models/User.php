<?php

namespace Model;

class User extends ActiveRecord{
    protected static $tabla = 'users';
    protected static $columnasDB = ['id', 'name', 'lastname', 'email', 'password'];

    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function comprobarPassword($password){
        $storedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $enteredPassword = password_hash($password, PASSWORD_DEFAULT);


        $resultado = password_verify($password, $storedPassword);
        
        if(!$resultado){
            self::$alertas[] = 'Wrong email or password';
        }else{
            return true;
        }
    }

    public function validar(){
        
        if(!$this->email){
            self::$alertas[] = "You must enter your email";
        }

        if(!$this->password){
            self::$alertas[] = "You must enter your password";
        }

        return self::$alertas;
    }
}