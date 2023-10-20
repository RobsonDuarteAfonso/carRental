<?php

    RequirePage::model('Car');
    RequirePage::model('Category');

    class ControllerCar extends Controller {

        public function __construct() {
            
            CheckSession::sessionAuth();
        }

        public function index() {
           
            CheckSession::checkAccessAdmin();
            $car = new Car;
            $select = $car->select(true);

            Twig::render('car/car-index.php', ['cars'=>$select]);
        }


        public function create() {

            CheckSession::checkAccessAdmin();
            $category = new Category;
            $categories = $category->select();

            Twig::render('car/car-create.php', ['categories'=>$categories]);
        }


        public function store() {            
            
            CheckSession::checkAccessAdmin();
            $car = new Car;
            $insert = $car->insert($_POST);         

            RequirePage::redirect('car');
        }


        public function edit($id) {

            CheckSession::checkAccessAdmin();
            $car = new Car;
            $selectId = $car->selectId($id);

            $category = new Category;
            $categories = $category->select();

            Twig::render('car/car-edit.php', ['car'=>$selectId, 'categories'=>$categories]);
        }


        public function update() {

            CheckSession::checkAccessAdmin();
            $car = new Car;
            $update = $car->update($_POST);

            if ($update) {
                
                RequirePage::redirect('car');
            
            } else {

                print_r($update);
            }
        }       

        
        public function confirm() {

            CheckSession::checkAccessAdmin();
            $car = new Car;
            $selectId = $car->selectId($_POST['id']);

            $category = new Category;
            $categories = $category->select();

            Twig::render('car/car-confirm.php', ['car'=>$selectId, 'categories'=>$categories]);
        }


        public function delete() {

            CheckSession::checkAccessAdmin();
            $car = new Car;
            $delete = $car->delete($_POST['id']);

            if ($delete) {
                
                RequirePage::redirect('car');
            
            } else {

                print_r($delete);
            }        
        }    

    }

?>