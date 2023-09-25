<?php

    require_once('Crud.php');

    class Rent extends Crud {

        public $table = 'rent';
        public $primaryKey = 'user_id';
        public $secondPrimaryKey = 'car_id';

        public $table2 = 'user';
        public $primaryKey2 = 'id';

        public $table3 = 'car';
        public $primaryKey3 = 'id';

        public $fillable = [
            'user_id',
            'car_id', 
            'start_date_rent',
            'start_time_rent',
            'end_date_rent',
            'end_time_rent',
            'price_per_day'
        ];
    }

?>