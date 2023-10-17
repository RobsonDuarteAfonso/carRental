{{ include('header.php', { title: 'Login' }) }}
<main>

    <section>

        <h1>Login</h1>
        
        <form action="{{ path }}login/auth" method="post">

            <label>Utilisateur
                <input type="email" name="username">
            </label>
            <label>Mot de passe
                <input type="password" name="password">
            </label>  

            <div class="buttons">
                <input type="submit" class="button_save" value="Se connecter">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>
            
        </form>

    </section>

</main>
{{ include('footer.php') }}