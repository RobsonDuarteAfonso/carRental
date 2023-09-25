{{ include('header.php', { title: 'Créer une Voiture' }) }}
<main>

    <section>

        <h1>Créer une Voiture</h1>
        
        <form action="{{ path }}car/store" method="post">

            <label>Modèle
                <input type="text" name="model">
            </label>
            <label>Marque
                <input type="text" name="brand">
            </label>        
            <label>Année
                <input type="text" name="year">
            </label>
            <label>Plaque
                <input type="text" name="license_plate">
            </label>
            <label>Kilométrage
                <input type="text" name="car_mileage">
            </label>
            <label>Catégorie

                <select name="category_id">
                    <option value="0">Sélectionner</option>    
                    {% for category in categories %}
                        <option value="{{ category.id }}">{{ category.name ~ " [" ~ category.type  ~ "]" }}</option>
                    {% endfor %}
                </select>

            </label>

            <div class="buttons">
                <input type="submit" class="button_save" value="Sauver">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>
            
        </form>

    </section>

</main>
{{ include('footer.php') }}