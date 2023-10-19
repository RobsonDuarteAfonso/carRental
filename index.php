<?php
    session_start();
    define('PATH_DIR', 'http://localhost/carrental/');

    require_once(__DIR__.'/controller/Controller.php');
    require_once(__DIR__.'/library/RequirePage.php');
    require_once(__DIR__.'/vendor/autoload.php');
    require_once(__DIR__.'/library/Twig.php');
    require_once (__DIR__.'/library/CheckSession.php');
    require_once (__DIR__.'/library/RegisterAccess.php');


    $url = isset($_GET["url"]) ? explode ('/', ltrim($_GET["url"], '/')) : '/';
   
    if ($url == '/') {

        $controller = getControllerHome();
        echo $controller->index();

    } else {

        $requestURL = $url[0];
        $requestURL = ucfirst($requestURL);
        $controllerPath = __DIR__.'/controller/Controller' . $requestURL . '.php';

        if (file_exists($controllerPath)) {

            require_once($controllerPath);
            $controlleName = 'Controller' . $requestURL;
            $controller = new $controlleName;

            if (isset($url[1]) && !empty($url[1])) {
                
                $method = $url[1];
   
                if (isset($url[2])) {

                    if (isset($url[3])) {
                        
                        RegisterAccess::save($requestURL .'/'. $method .'/'. $url[2] .'/'. $url[3]);
                        echo $controller->$method($url[2], $url[3]);

                    } else {

                        RegisterAccess::save($requestURL .'/'. $method .'/'. $url[2]);
                        echo $controller->$method($url[2]);
                    }

                } else {
                    
                    RegisterAccess::save($requestURL .'/'. $method);
                    echo $controller->$method();
                }

            } else {

                RegisterAccess::save($requestURL .'/index');
                echo $controller->index();
            }

        } else {

            $controller = getControllerHome();
            echo $controller->error();
        }
    }

    function getcontrollerHome() {
        
        $controllerHome = __DIR__.'/controller/ControllerHome.php';
        require_once($controllerHome);
        $controller = new ControllerHome;
        RegisterAccess::save('home/index');
        return $controller;        
    }

?>