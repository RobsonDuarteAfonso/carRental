{{ include('header.php', { title: 'Créer une Catégorie' }) }}
<main>

    <section>

        <h1>Créer une Catégorie</h1>
        
        <form action="{{ path }}category/store" method="post">

            <label>Nom
                <input type="text" name="name">
            </label>
            <label>Type
                <input type="text" name="type">
            </label>  

            <div class="buttons">
                <input type="submit" class="button_save" value="Sauver">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>
            
        </form>

    </section>

</main>
{{ include('footer.php') }}