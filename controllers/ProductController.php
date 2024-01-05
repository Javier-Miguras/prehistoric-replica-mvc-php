<?php

namespace Controllers;

use Model\Post;
use Model\Product;
use Model\Seller;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController{
    public static function index(Router $router){

        session_start();
        isAuth();

        $products = Product::all();
        $posts = Post::all();
        $sellers = Seller::all();
        $result = $_GET['result'] ?? null;

        $router->render('/products/admin', [
            'products' => $products,
            'posts' => $posts,
            'sellers' => $sellers,
            'result' => $result
        ]);
    }
    public static function create(Router $router){

        session_start();
        isAuth();


        $product = new Product;
        $sellers = Seller::all();
        $alertas = Product::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $product = new Product($_POST['product']);
            
            $imageName = "../images/" . md5(uniqid(rand(), true)) . ".jpg";


            if($_FILES['product']['tmp_name']['image']){
                $image = Image::make($_FILES['product']['tmp_name']['image'])->fit(800, 500);
                $product->setImagen($imageName);
            }

            //Validar

            $alertas = $product->validar();

            if(empty($alertas)){
                if(!is_dir(CARPETA_IMAGENES)){ //is_dir verifica si existe 
                    mkdir(CARPETA_IMAGENES); //mkdir crea la carpeta
                }
    
                //Guarda la imagen en el servidor
    
                $image->save(CARPETA_IMAGENES . $imageName);
    
                //Guarda en la base de datos
    
                $product->guardar();

                header('Location: /admin?result=1');
            }
            
        }

        $router->render('/products/create',[
            'product' => $product,
            'sellers' => $sellers,
            'alertas' => $alertas
        ]);
    }
    public static function update(Router $router){

        session_start();
        isAuth();

        $id = IdByGet();
        $product = Product::find($id);

        if(!$product){
            header('Location: /admin');
        }

        $sellers = Seller::all();
        $alertas = Product::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['product'];
            $product->sincronizar($args);
            
            $alertas = $product->validar();

            $imageName = "../images/" . md5(uniqid(rand(), true)) . ".jpg";


            if($_FILES['product']['tmp_name']['image']){
                $image = Image::make($_FILES['product']['tmp_name']['image'])->fit(800, 500);
                $product->setImagen($imageName);
            }

            if(empty($alertas)){

                //Guarda la imagen en el servidor
                if($_FILES['product']['tmp_name']['image']){
                    $image->save(CARPETA_IMAGENES . $imageName);
                }
    
                //Guarda en la base de datos
    
                $product->guardar();

                header('Location: /admin?result=2');
            }

        }

        $router->render('/products/update', [
            'product' => $product,
            'sellers' => $sellers,
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
                    $product = Product::find($id);
                    $product->eliminar();
                }
            }
            
        }
        header('location: /admin?result=3');
        
    }
}