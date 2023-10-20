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
            {% if guest %}
                <a href="{{path}}user/create">Nouvel utilisateur</a>
                <a href="{{ path }}login">Login</a>
            {% else %}
                <a href="{{ path }}rent">Location</a>
                {% if session.privilege == 1 %}            
                    <a href="{{ path }}user">Client</a>
                    <a href="{{ path }}car">Voiture</a>
                    <a href="{{ path }}category">Catégorie</a>
                    <a href="{{ path }}log">Journal de bord</a>
                {% endif %}
                <a href="{{ path }}login/logout">Logout</a>
            {% endif %}
        </nav>
    </header>
    
        <div class="name_user">
            {% if session|length > 0 %}
                <span class="material-icons">person</span>
                <span class="name_user-text">{{ session.user_nom }}</span>
            {% endif %}
        </div>
    
    