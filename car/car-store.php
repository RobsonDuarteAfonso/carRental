<?php

require_once('../classe/Crud.php');

$crud = new Crud;
$crud->insert('user', $_POST);

header("location:user-index.php");

?>