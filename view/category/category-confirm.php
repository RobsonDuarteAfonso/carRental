{{ include('header.php', { title: 'Supprimer une Catégorie' }) }}
<main>

    <section>

        <h1>Supprimer une Catégorie</h1>
        
        <form action="{{ path }}category/delete" method="post">

            <input type="hidden" name="id" value="{{ category.id }}">
            <label>Nom
                <input type="text" name="name" value="{{ category.name }}" disabled>
            </label>
            <label>Type
                <input type="text" name="type" value="{{ category.type }}" disabled>
            </label> 

            <div class="buttons">
                <input type="submit" class="button_delete" value="Supprimer">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>             

        </form>

    </section>

</main>
{{ include('footer.php') }}