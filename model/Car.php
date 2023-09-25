<?php

    require_once('Crud.php');

    class Car extends Crud {

        public $table = 'car';
        public $primaryKey = 'id';

        public $table2 = 'category';
        public $primaryKey2 = 'id';

        public $fillable = [
            'id',
            'model', 
            'brand',
            'year',
            'license_plate',
            'car_mileage',
            'category_id'
        ];
    }

?>