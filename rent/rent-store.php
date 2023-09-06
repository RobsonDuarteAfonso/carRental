<?php

require_once('../classe/Crud.php');

$crud = new Crud;
$crud->insert('rent', $_POST);

header("location:rent-index.php");

?>