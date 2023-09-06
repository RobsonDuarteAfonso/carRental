<?php

require_once('../classe/Crud.php');

$crud = new Crud;
$crud->insert('category', $_POST);

header("location:category-index.php");

?>