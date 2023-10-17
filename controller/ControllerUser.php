<?php

    RequirePage::model('User');

    class ControllerUser extends Controller {

        public function index() {
           
            $user = new User;
            $select = $user->select();

            Twig::render('user/user-index.php', ['users'=>$select]);
        }


        public function create() {

            Twig::render('user/user-create.php');
        }


        public function store() {            
            
            $user = new User;

            $options = [
                'cost' => 10
            ];

            $hashPassword= password_hash($password, PASSWORD_BCRYPT, $options);
               
            $_POST['password'] = $hashPassword;

            $insert = $user->insert($_POST);         

            RequirePage::redirect('user');
        }


        public function edit($id) {

            $user = new User;
            $selectId = $user->selectId($id);       

            Twig::render('user/user-edit.php', ['user'=>$selectId]);
        }


        public function update() {

            $user = new User;
            $update = $user->update($_POST);

            if ($update) {
                
                RequirePage::redirect('user');
            
            } else {

                print_r($update);
            }
        }       

        
        public function confirm() {

            $user = new User;
            $selectId = $user->selectId($_POST['id']);       

            Twig::render('user/user-confirm.php', ['user'=>$selectId]);
        }


        public function delete() {

            $user = new User;
            $delete = $user->delete($_POST['id']);

            if ($delete) {
                
                RequirePage::redirect('user');
            
            } else {

                print_r($delete);
            }        
        }    

    }

?>