{{ include('header.php', { title: 'Créer un Client' }) }}
<main>

    <section>

        <h1>Créer un Client</h1>
        
        <form action="{{ path }}user/store" method="post">

            <label>
                Privilege
                <select name="privilege_id">
                    <option value="0">Sélectionner</option> 
                    {% for privilege in privileges %}
                    <option value="{{privilege.id}}" {% if  privilege.id == data.privilege_id %} selected {% endif %}>{{ privilege.privilege}}</option>
                    {% endfor%}
                </select>
            </label> 
            <label>Nom
                <input type="text" name="name">
            </label>
            <label>Adresse
                <input type="text" name="address">
            </label>        
            <label>Courriel
                <input type="email" name="email">
            </label>        
            <label>Password
                <input type="password" name="password">
            </label>
            <label>Permit
                <input type="text" name="driver_license">
            </label>
            <label>Expiration
                <input type="date" name="expiration_date">
            </label>

            <div class="buttons">
                <input type="submit" class="button_save" value="Sauver">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>
            
        </form>

    </section>

</main>
{{ include('footer.php') }}