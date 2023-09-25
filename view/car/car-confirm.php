{{ include('header.php', { title: 'Supprimer une Voiture' }) }}
<main>

    <section>

        <h1>Supprimer une Voiture</h1>
        
        <form action="{{ path }}car/delete" method="post">

            <input type="hidden" name="id" value="{{ car.id }}">
            <label>Modèle
                <input type="text" name="model" value="{{ car.model }}" disabled>
            </label>
            <label>Marque
                <input type="text" name="brand" value="{{ car.brand }}" disabled>
            </label>        
            <label>Année
                <input type="text" name="year" value="{{ car.year }}" disabled>
            </label>
            <label>Plaque
                <input type="text" name="license_plate" value="{{ car.license_plate }}" disabled>
            </label>
            <label>Kilométrage
                <input type="text" name="car_mileage" value="{{ car.car_mileage }}" disabled>
            </label>
            <label>Catégorie
                <select name="category_id" disabled>
                    <option value="0">Sélectionner</option>
                    
                    {% for category in categories %}
                        <option value="{{ category.id }}" {% if car.category_id == category.id %} selected {% endif %}>{{ category.name ~ " [" ~ category.type  ~ "]" }}</option>
                    {% endfor %}
                 
                </select>
            </label> 

            <div class="buttons">
                <input type="submit" class="button_delete" value="Supprimer">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>             

        </form>

    </section>

</main>
{{ include('footer.php') }}