{{ include('header.php', { title: 'Modifier un Client' }) }}
<main>

    <section>

        <h1>Modifier un Client</h1>
        
        <form action="{{ path }}user/update" method="post">

            <input type="hidden" name="id" value="{{ user.id }}">
            <label>Nom
                <input type="text" name="name" value="{{ user.name }}">
            </label>
            <label>Adresse
                <input type="text" name="address" value="{{ user.address }}>">
            </label>        
            <label>Courriel
                <input type="email" name="email" value="{{ user.email }}">
            </label>
            <label>Permit
                <input type="text" name="driver_license" value="{{ user.driver_license }}">
            </label>
            <label>Expiration
                <input type="date" name="expiration_date" value="{{ user.expiration_date }}">
            </label>

            <div class="buttons">
                <input type="submit" class="button_modifier" value="Modifier">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>            

        </form>

    </section>

</main>
{{ include('footer.php') }}