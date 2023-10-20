<?php

    RequirePage::model('Category');

    class ControllerCategory extends Controller {

        public function __construct() {
            
            CheckSession::sessionAuth();
        }        

        public function index() {
           
            CheckSession::checkAccessAdmin();
            $category = new Category;
            $select = $category->select();

            Twig::render('category/category-index.php', ['categories'=>$select]);
        }


        public function create() {

            CheckSession::checkAccessAdmin();
            Twig::render('category/category-create.php');
        }


        public function store() {            
            
            CheckSession::checkAccessAdmin();
            $category = new Category;
            $insert = $category->insert($_POST);         

            RequirePage::redirect('category');
        }


        public function edit($id) {

            CheckSession::checkAccessAdmin();
            $category = new Category;
            $selectId = $category->selectId($id);       

            Twig::render('category/category-edit.php', ['category'=>$selectId]);
        }


        public function update() {

            CheckSession::checkAccessAdmin();
            $category = new Category;
            $update = $category->update($_POST);

            if ($update) {
                
                RequirePage::redirect('category');
            
            } else {

                print_r($update);
            }
        }       

        
        public function confirm() {

            CheckSession::checkAccessAdmin();
            $category = new Category;
            $selectId = $category->selectId($_POST['id']);       

            Twig::render('category/category-confirm.php', ['category'=>$selectId]);
        }


        public function delete() {

            CheckSession::checkAccessAdmin();
            $category = new Category;
            $delete = $category->delete($_POST['id']);

            if ($delete) {
                
                RequirePage::redirect('category');
            
            } else {

                print_r($delete);
            }        
        }    

    }

?>