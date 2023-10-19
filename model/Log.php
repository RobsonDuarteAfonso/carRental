<?php
require_once('Crud.php');

class Log extends Crud {

    public $table = 'log';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'address_ip',
        'date',
        'guest',
        'page_visited',
        'user_id'
    ];
}

?>