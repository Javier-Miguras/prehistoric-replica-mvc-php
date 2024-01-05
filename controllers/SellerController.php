<?php

namespace Controllers;

use Model\Seller;
use MVC\Router;

class SellerController{
    
    public static function create(Router $router){

        session_start();
        isAuth();

        $seller = new Seller;
        $alertas = Seller::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $seller = new Seller($_POST['seller']);

            $alertas = $seller->validar();

            if(empty($alertas)){
                $seller->guardar();

                header('Location: /admin?result=1');
            }
            
        }

        $router->render('seller/create', [
            'seller' => $seller,
            'alertas' => $alertas
        ]);
    }
    public static function update(Router $router){

        session_start();
        isAuth();

        $id = IdByGet();
        $seller = Seller::find($id);

        if(!$seller){
            header('Location: /admin');
        }

        $alertas = Seller::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['seller'];
            $seller->sincronizar($args);

            $alertas = $seller->validar();

            if(empty($alertas)){
                $seller->guardar();

                header('Location: /admin?result=2');
            }
        }

        $router->render('/seller/update', [
            'seller' => $seller,
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
                    $seller = Seller::find($id);
                    $seller->eliminar();
                }
            }
        }
        header('Location: /admin?result=3');
    }
}