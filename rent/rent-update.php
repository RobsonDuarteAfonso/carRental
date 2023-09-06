<?php

require_once('../classe/Crud.php');

$crud = new Crud;
$crud->updateDoublePK('rent', $_POST, 'user_id', 'car_id');

?>