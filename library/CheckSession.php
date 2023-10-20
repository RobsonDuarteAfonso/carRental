<?php

class CheckSession {

    static public function sessionAuth($redirect = true) {

        if (isset($_SESSION['fingerPrint']) && $_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'])) {
            
            return true;
        
        } else {
            
            if ($redirect) {
                RequirePage::redirect('login');
            } else {
                return false;
            }
        }
    }

    static public function checkAccessAdmin() {

        if ($_SESSION['privilege'] != 1) {
            
            RequirePage::redirect('home');
        } 
    }
}

?>