<?php

    RequirePage::model('User');
    RequirePage::model('Privilege');

    class ControllerUser extends Controller {

        public function index() {

            CheckSession::checkAccessAdmin();
            $user = new User;
            $select = $user->select(true);

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

            $hashPassword= password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $_POST['password'] = $hashPassword;

            if (!isset($_POST['privilege_id'])) {
                $_POST['privilege_id'] = 2;
            }

            $insert = $user->insert($_POST);         

            RequirePage::redirect('login');
        }


        public function edit($id) {

            CheckSession::checkAccessAdmin();
            $user = new User;
            $privilege = new Privilege;

            $selectId = $user->selectId($id);
            $select = $privilege->select();

            Twig::render('user/user-edit.php', ['user'=>$selectId, 'privileges'=>$select]);            
        }


        public function update() {

            $user = new User;

            if ($_POST['password'] != "") {

                $options = [
                    'cost' => 10
                ];

                $hashPassword= password_hash($password, PASSWORD_BCRYPT, $options);
               
                $_POST['password'] = $hashPassword;                
            }

            $update = $user->update($_POST);

            if ($update) {
                
                RequirePage::redirect('user');
            
            } else {

                print_r($update);
            }
        }       

        
        public function confirm() {

            CheckSession::checkAccessAdmin();
            $user = new User;
            $selectId = $user->selectId($_POST['id']);

            $privilege = new Privilege;
            $select = $privilege->selectId($selecteId['privilege_id']);

            Twig::render('user/user-confirm.php', ['user'=>$selectId, 'privilege'=>$select]);
        }


        public function delete() {

            CheckSession::checkAccessAdmin();
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