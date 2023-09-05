<?php
    include("../header.php");
?>
<main>

    <section>

        <h1>Créer un Client</h1>
        
        <form action="user-store.php" method="post">

            <label>Nom
                <input type="text" name="name">
            </label>
            <label>Adresse
                <input type="text" name="address">
            </label>        
            <label>Courriel
                <input type="email" name="email">
            </label>
            <label>Permit
                <input type="text" name="driver_license">
            </label>
            <label>Expiration
                <input type="date" name="expiration_date">
            </label>

            <input type="submit" class="button_save" value="Sauver">
            
        </form>

    </section>

</main>
<?php
    include("../footer.php");
?>