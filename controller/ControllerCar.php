<?php

    RequirePage::model('Car');
    RequirePage::model('Category');

    class ControllerCar extends Controller {

        public function index() {
           
            $car = new Car;
            $select = $car->select(true);

            Twig::render('car/car-index.php', ['cars'=>$select]);
        }


        public function create() {

            $category = new Category;
            $categories = $category->select();

            Twig::render('car/car-create.php', ['categories'=>$categories]);
        }


        public function store() {            
            
            $car = new Car;
            $insert = $car->insert($_POST);         

            RequirePage::redirect('car');
        }


        public function edit($id) {

            $car = new Car;
            $selectId = $car->selectId($id);

            $category = new Category;
            $categories = $category->select();

            Twig::render('car/car-edit.php', ['car'=>$selectId, 'categories'=>$categories]);
        }


        public function update() {

            $car = new Car;
            $update = $car->update($_POST);

            if ($update) {
                
                RequirePage::redirect('car');
            
            } else {

                print_r($update);
            }
        }       

        
        public function confirm() {

            $car = new Car;
            $selectId = $car->selectId($_POST['id']);

            $category = new Category;
            $categories = $category->select();

            Twig::render('car/car-confirm.php', ['car'=>$selectId, 'categories'=>$categories]);
        }


        public function delete() {

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