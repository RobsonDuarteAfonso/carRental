<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rent - {{ title }}</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ path }}assets/css/styles.css">
    <script src="{{ path }}assets/js/main.js" defer></script>
</head>
<body>
    <header>
        <h1>Car Rent</h1>
        <nav>
            <a href="{{ path }}home">Accueil</a>
            <a href="{{ path }}user">Client</a>
            <a href="{{ path }}car">Voiture</a>
            <a href="{{ path }}category">Catégorie</a>
            <a href="{{ path }}rent">Location</a>
            <a href="{{ path }}log">Journal de bord</a>
            <a href="{{ path }}login">Login</a>
            <a href="{{ path }}login/logout">Logout</a>
        </nav>
    </header>