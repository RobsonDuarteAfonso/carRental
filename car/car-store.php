<?php

require_once('../classe/Crud.php');

$crud = new Crud;
$crud->insert('car', $_POST);

header("location:car-index.php");

?>