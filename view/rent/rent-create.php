{{ include('header.php', { title: 'Créer une Location' }) }}
<main>

    <section>

        <h1>Créer une Location</h1>
        
        <form action="{{ path }}rent/store" method="post">

            {% if session.privilege == 1 %}
            <label>Client
                <select name="user_id">
                    <option value="0">Sélectionner</option>
                    
                    {% for user in users %}
                        <option value="{{ user.id }}">{{ user.name }}</option>
                    {% endfor %}
                </select>
            </label>
            {% else %}
                <input type="hidden" name="user_id" value="{{ userId }}">
            {% endif %}
            <label>Voiture
                <select name="car_id">
                    <option value="0">Sélectionner</option>
                    
                    {% for car in cars %}
                        <option value="{{ car.id }}">{{ car.model ~ " - " ~ car.brand }}</option>
                    {% endfor %}
                </select>
            </label>
            <label>Debut
                <input type="date" name="start_date_rent">
                <input type="time" name="start_time_rent">
            </label>
            <label>Fin
                <input type="date" name="end_date_rent">
                <input type="time" name="end_time_rent">
            </label>             
            <label>Prix par Jour
                <input type="text" name="price_per_day">
            </label>

            <div class="buttons">
                <input type="submit" class="button_save" value="Sauver">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>
            
        </form>

    </section>

</main>
{{ include('footer.php') }}