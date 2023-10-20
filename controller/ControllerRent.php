<?php

    RequirePage::model('Rent');
    RequirePage::model('Car');
    RequirePage::model('User');

    class ControllerRent extends Controller {

        public function __construct() {
            
            CheckSession::sessionAuth();
        }        

        public function index() {
           
            $rent = new Rent;
            $rents = $rent->select(true, false, "user_id");

            if ($_SESSION['privilege'] == 1) {

                $rents = $rent->select(true, false, "user_id");

            } else {

                $rents = $rent->select(true, false, "user_id", $_SESSION['user_id']);
            }

            Twig::render('rent/rent-index.php', ['rents'=>$rents]);
        }


        public function create() {

            $car = new Car;
            $cars = $car->select();

            $user = new User;
            $users = $user->select();            

            Twig::render('rent/rent-create.php', ['cars'=>$cars, 'users'=>$users, 'userId'=>$_SESSION['user_id']]);
        }


        public function store() {            
            
            $rent = new Rent;
            $insert = $rent->insert($_POST);         

            RequirePage::redirect('rent');
        }

        public function edit($id, $id2) {

            CheckSession::checkAccessAdmin();
            $rent = new Rent;
            $selectRent = $rent->selectId($id, $id2);
            
            $user = new User;
            $selectUser = $user->selectId($id); 
            
            $car = new Car;
            $selectCar = $car->selectId($id2);

            Twig::render('rent/rent-edit.php', ['rent'=>$selectRent, 'car'=>$selectCar, 'user'=>$selectUser]);
        }


        public function update() {

            CheckSession::checkAccessAdmin();
            $rent = new Rent;
            $update = $rent->update($_POST, true);

            if ($update) {
                
                RequirePage::redirect('rent');
            
            } else {

                print_r($update);
            }
        }       

        
        public function confirm() {

            CheckSession::checkAccessAdmin();
            $rent = new Rent;
            $selectRent = $rent->selectId($_POST['user_id'], $_POST['car_id']);

            $car = new Car;
            $selectCar = $car->selectId($_POST['car_id']);

            $user = new User;
            $selectUser = $user->selectId($_POST['user_id']);

            Twig::render('rent/rent-confirm.php', ['rent'=>$selectRent, 'car'=>$selectCar, 'user'=>$selectUser]);
        }


        public function delete() {

            CheckSession::checkAccessAdmin();
            $rent = new Rent;
            $delete = $rent->delete($_POST['user_id'], $_POST['car_id']);

            if ($delete) {
                
                RequirePage::redirect('rent');
            
            } else {

                print_r($delete);
            }        
        }    

    }

?>