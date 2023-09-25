{{ include('header.php', { title: 'Modifier une Voiture' }) }}
<main>

    <section>

        <h1>Modifier une Voiture</h1>
        
        <form action="{{ path }}car/update" method="post">

            <input type="hidden" name="id" value="{{ car.id }}">
            <label>Modèle
                <input type="text" name="model" value="{{ car.model }}">
            </label>
            <label>Marque
                <input type="text" name="brand" value="{{ car.brand }}">
            </label>        
            <label>Année
                <input type="text" name="year" value="{{ car.year }}">
            </label>
            <label>Plaque
                <input type="text" name="license_plate" value="{{ car.license_plate }}">
            </label>
            <label>Kilométrage
                <input type="text" name="car_mileage" value="{{ car.car_mileage }}">
            </label>
            <label>Catégorie
                <select name="category_id">
                    <option value="0">Sélectionner</option>
                    
                    {% for category in categories %}
                        <option value="{{ category.id }}" {% if car.category_id == category.id %} selected {% endif %}>{{ category.name ~ " [" ~ category.type  ~ "]" }}</option>
                    {% endfor %}
                 
                </select>
            </label> 

            <div class="buttons">
                <input type="submit" class="button_modifier" value="Modifier">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>            

        </form>

    </section>

</main>
{{ include('footer.php') }}