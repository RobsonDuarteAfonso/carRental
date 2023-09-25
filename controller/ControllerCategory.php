<?php

    RequirePage::model('Category');

    class ControllerCategory extends Controller {

        public function index() {
           
            $category = new Category;
            $select = $category->select();

            Twig::render('category/category-index.php', ['categories'=>$select]);
        }


        public function create() {

            Twig::render('category/category-create.php');
        }


        public function store() {            
            
            $category = new Category;
            $insert = $category->insert($_POST);         

            RequirePage::redirect('category');
        }


        public function edit($id) {

            $category = new Category;
            $selectId = $category->selectId($id);       

            Twig::render('category/category-edit.php', ['category'=>$selectId]);
        }


        public function update() {

            $category = new Category;
            $update = $category->update($_POST);

            if ($update) {
                
                RequirePage::redirect('category');
            
            } else {

                print_r($update);
            }
        }       

        
        public function confirm() {

            $category = new Category;
            $selectId = $category->selectId($_POST['id']);       

            Twig::render('category/category-confirm.php', ['category'=>$selectId]);
        }


        public function delete() {

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