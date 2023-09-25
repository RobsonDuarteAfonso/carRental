<?php

    class ControllerHome extends Controller {

        public function index() {
            Twig::render('home-index.php');
        }

        public function error() {
            Twig::render('home-error.php');
        }

    }

?>