<?php

require_once('../classe/Crud.php');

$crud = new Crud;
$crud->update('car', $_POST);

?>