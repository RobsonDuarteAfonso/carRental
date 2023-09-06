<?php

$userId = $_POST['user_id'];
$carId = $_POST['car_id'];

require_once('../classe/Crud.php');

$crud = new Crud;
$crud->deleteDoublePK('rent', $userId, $carId, 'user_id', 'car_id');

?>