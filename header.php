<?php 
    define("APP", "/carrental/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rent</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?=APP?>assets/css/styles.css">
    <script src="<?=APP?>assets/js/main.js" defer></script>
</head>
<body>
    <header>
        <h1>Car Rent</h1>
        <nav>
            <a href="<?=APP?>index.php">Accueil</a>
            <a href="<?=APP?>user/user-index.php">Client</a>
            <a href="<?=APP?>car/car-index.php">Voiture</a>
            <a href="<?=APP?>category/category-index.php">Catégorie</a>
            <a href="<?=APP?>rent/rent-index.php">Location</a>
        </nav>
    </header>

