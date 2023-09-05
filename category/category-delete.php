<?php

$id = $_POST['id'];

require_once('../classe/Crud.php');

$crud = new Crud;
$crud->delete('user', $id);

?>