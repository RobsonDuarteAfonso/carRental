<?php

    require_once('Crud.php');

    class Category extends Crud {

        public $table = 'category';
        public $primaryKey = 'id';

        public $fillable = [
            'id',
            'name', 
            'type'
        ];
    }

?>