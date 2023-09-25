{{ include('header.php', { title: 'Modifier une Catégorie' }) }}
<main>

    <section>

        <h1>Modifier une Catégorie</h1>
        
        <form action="{{ path }}category/update" method="post">

            <input type="hidden" name="id" value="{{ category.id }}">
            <label>Nom
                <input type="text" name="name" value="{{ category.name }}">
            </label>
            <label>Type
                <input type="text" name="type" value="{{ category.type }}">
            </label> 

            <div class="buttons">
                <input type="submit" class="button_modifier" value="Modifier">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>            

        </form>

    </section>

</main>
{{ include('footer.php') }}