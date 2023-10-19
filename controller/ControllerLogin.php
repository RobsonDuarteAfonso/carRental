<?php

RequirePage::model('User');

class ControllerLogin extends Controller {

    public function index() {
        
        Twig::render('login.php');
    }
    
    public function auth() {
        
        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            RequirePage::redirect('login');
            exit();
        }

        extract($_POST);

        $user = new User;

        if ($user->checkUser($email, $password)) {

            RequirePage::redirect('home');

        } else {

            RequirePage::redirect('home/error');
        }
    }

    public function logout() {

        session_destroy();
        RequirePage::redirect('login');
    }
}   
?>