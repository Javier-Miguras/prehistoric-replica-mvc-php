<?php

namespace Controllers;

use Model\Post;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class PostController{
    public static function create(Router $router){

        session_start();
        isAuth();

        $post = new Post;
        $alertas = Post::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $post = new Post($_POST['post']);

            $imageName = "../images/" . md5(uniqid(rand(), true)) . ".jpg";


            if($_FILES['post']['tmp_name']['image']){
                $image = Image::make($_FILES['post']['tmp_name']['image'])->fit(800, 500);
                $post->setImagen($imageName);
            }

            //Validar

            $alertas = $post->validar();

            if(empty($alertas)){
                if(!is_dir(CARPETA_IMAGENES)){ //is_dir verifica si existe 
                    mkdir(CARPETA_IMAGENES); //mkdir crea la carpeta
                }
    
                //Guarda la imagen en el servidor
    
                $image->save(CARPETA_IMAGENES . $imageName);
    
                //Guarda en la base de datos
    
                $post->guardar();

                header('Location: /admin?result=1');
            }

        }

        $router->render('posts/create', [
            'post' => $post,
            'alertas' => $alertas
        ]);

    }
    public static function update(Router $router){

        session_start();
        isAuth();

        $id = IdByGet();
        $post = Post::find($id);

        if(!$post){
            header('Location: /admin');
        }

        $alertas = Post::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $args = $_POST['post'];
            $post->sincronizar($args);
            
            $alertas = $post->validar();

            $imageName = "../images/" . md5(uniqid(rand(), true)) . ".jpg";


            if($_FILES['post']['tmp_name']['image']){
                $image = Image::make($_FILES['post']['tmp_name']['image'])->fit(800, 500);
                $post->setImagen($imageName);
            }

            if(empty($alertas)){

                //Guarda la imagen en el servidor
                if($_FILES['post']['tmp_name']['image']){
                    $image->save(CARPETA_IMAGENES . $imageName);
                }

                //Guarda en la base de datos
    
                $post->guardar();

                header('Location: /admin?result=2');

            }

        }

        $router->render('posts/update', [
            'post' => $post,
            'alertas' => $alertas
        ]);
        
    }
    public static function delete(){

        session_start();
        isAuth();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if($id){
                $type = $_POST['type'];
                
                if(validarTipoContenido($type)){
                    $post = Post::find($id);
                    $post->eliminar();
                }
            }
        }
        header('location: /admin?result=3');
    }
}