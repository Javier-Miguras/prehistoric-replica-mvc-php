<?php

namespace Controllers;

use Model\Post;
use Model\Product;
use Model\Seller;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){

        $products = Product::getInOrder(4, 'id');
        $posts = Post::getInOrder(3, 'date');

        $router->render('paginas/index', [
            'products' => $products,
            'posts' => $posts
        ]);
    }
    public static function about(Router $router){
        $router->render('paginas/about');
    }
    public static function explore(Router $router){

        $products = Product::allInOrder('id');

        $router->render('paginas/explore', [
            'products' => $products
        ]);
    }
    public static function product(Router $router){

        $id = IdByGet();
        $product = Product::find($id);

        $seller = Seller::find($product->salespeople_id);

        if(!$product){
            header('Location: /explore');
        }

        $router->render('paginas/product', [
            'product' => $product,
            'seller' => $seller
        ]);
    }
    public static function contact(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $responses = $_POST['contact'];
            
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Port = $_ENV['EMAIL_PORT'];
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = 'tls';

            $mail->setFrom('admin@prehistoric-replica.com');
            $mail->addAddress('admin@prehistoric-replica.com', 'prehistoric-replica.com');
            $mail->Subject = 'You have a new message';

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $content = '<html>';
            $content = $content .= '<h1>New Message From Your Contact Form</h1>';
            $content = $content .= '<h3>Submission Data</h3>';
            $content = $content .= '<p>Name: ' . $responses['name'] . '</p>' ;
            $content = $content .= '<p>Phone: ' . $responses['phone'] . '</p>' ;
            $content = $content .= '<p>Email: ' . $responses['email'] . '</p>' ;
            $content = $content .= '<p>Message: ' . $responses['message'] . '</p>' ;
            $content = $content .= '<br/>';
            $content = $content .= "<p>This message has been sent from the contact form on your website <a href=" . $_ENV['APP_URL'] . ">prehistoric-replica</a></p>";
            $content = $content .= '</html>';

            $mail->Body = $content;
            $mail->AltBody = 'Alternative text without HTML';

            $mail->addReplyTo($responses['email'], $responses['name']);

            if($mail->send()){
                $message = 'Message sent successfully';
                $alertType = 'exito';
            }else{
                $message = 'The message could not be sent...';
                $alertType = 'error';
            }
        }

        $router->render('paginas/contact', [
            'message' => $message,
            'alertType' => $alertType
        ]);
    }

    public static function blog(Router $router){

        $posts = Post::allInOrder('date');

        $router->render('paginas/blog', [
            'posts' => $posts
        ]);
    }

    public static function post(Router $router){

        $id = IdByGet();
        $post = Post::find($id);

        if(!$post){
            header('Location: /blog');
        }

        $router->render('paginas/post', [
            'post' => $post
        ]);
    }
}