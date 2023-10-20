<?php

    class Twig {

        static public function render($template, $data=array(), $pdf = false) {

            $loader = new \Twig\Loader\FilesystemLoader('view');

            $twig = new \Twig\Environment($loader, array('auto_reload' => true));

            $twig->addGlobal('path', PATH_DIR);

            if (isset($_SESSION['fingerPrint']) && $_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'])) {
                
                $guest = false;
            
            } else {
            
                $guest = true;
            }
            
            $twig->addGlobal('session', $_SESSION);
    
            $twig->addGlobal('guest', $guest);

            if ($pdf) {

                return $twig->render($template, $data);
                
            } else {

                echo $twig->render($template, $data);
            }

            
        }

    }

?>