{{ include('header.php', { title: 'Supprimer un Client' }) }}
<main>

    <section>

        <h1>Supprimer un Client</h1>
        
        <form action="{{ path }}user/delete" method="post">

            <input type="hidden" name="id" value="{{ user.id }}">
            <label>Nom
                <input type="text" name="name" value="{{ user.name }}" disabled>
            </label>
            <label>Adresse
                <input type="text" name="address" value="{{ user.address }}" disabled>
            </label>        
            <label>Courriel
                <input type="email" name="email" value="{{ user.email }}" disabled>
            </label>
            <label>Permit
                <input type="text" name="driver_license" value="{{ user.driver_license }}" disabled>
            </label>
            <label>Expiration
                <input type="date" name="expiration_date" value="{{ user.expiration_date }}" disabled>
            </label>
            <label>Type
                <input type="date" name="type" value="{{ privilege.type }}" disabled>
            </label>            

            <div class="buttons">
                <input type="submit" class="button_delete" value="Supprimer">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>             

        </form>

    </section>

</main>
{{ include('footer.php') }}