<?php

    require_once('Crud.php');

    class User extends Crud {

        public $table = 'user';
        public $primaryKey = 'id';

        public $fillable = [
            'id',
            'name', 
            'email',
            'address',
            'driver_license',
            'expiration_date'
        ];
    }

?>