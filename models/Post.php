<?php

namespace Model;

class Post extends ActiveRecord{
    protected static $tabla = 'posts';
    protected static $columnasDB = ['id', 'title', 'image', 'content', 'date'];

    public $id;
    public $title;
    public $image;
    public $content;
    public $date;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->title = $args['title'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->content = $args['content'] ?? '';
        $this->date = date('Y-m-d');
    }

    public function validar(){
        
        if(!$this->title){
            self::$alertas[] = "You must add a title";
        }

        if(!$this->image){
            self::$alertas[] = "You must add an image";
        }

        if(!$this->content){
            self::$alertas[] = "The content is mandatory";
        }

        if(strlen($this->content) < 50){
            self::$alertas[] = "The content should be at least 50 characters long";
        }

        return self::$alertas;
    }
}