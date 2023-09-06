<?php

require_once('../classe/Crud.php');

$crud = new Crud;
$crud->update('category', $_POST);

?>