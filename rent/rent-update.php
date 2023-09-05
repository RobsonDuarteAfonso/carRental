<?php

require_once('../classe/Crud.php');

$crud = new Crud;
$crud->update('user', $_POST);

?>