<?php

namespace Controllers;

use Model\User;
use MVC\Router;

class LoginController{
    public static function login(Router $router){

        $alertas = User::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new User($_POST);
            $user = User::where('email', $auth->email);

            $alertas = $auth->validar();

            if(empty($alertas)){
                if($user){

                    if($user->comprobarPassword($auth->password)){
                        //Autenticar el usuario
    
                        session_start();
    
                        $_SESSION['id'] = $user->id;
                        $_SESSION['name'] = $user->name . " " . $user->lastname;
                        $_SESSION['email'] = $user->email;
                        $_SESSION['login'] = true;
    
                        //Redireccionamiento
    
                        header('Location: /admin');
                    }else{
                        $alertas = User::getAlertas();
                    }
                }else{
                    $alertas[] = 'Wrong email or password';
                }
    
            }
            
        }
        $router->render('auth/login', [
            'alertas' => $alertas
        ]);
    }
    public static function logout(){
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}