<?php
    include("../header.php");

    require_once('../classe/Crud.php');
    
    $crud = new Crud;
    $select = $crud->select('category', 'name');
?>
<main>

    <section>

        <h1>Créer une Voiture</h1>
        
        <form action="car-store.php" method="post">

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
                    
                    <?php foreach($select as $row) : ?>
                        <option value="<?=$row['id']?>"><?=$row['name'] ." [". $row['type'] ."]"?></option>
                    <?php endforeach ?>
                </select>
            </label>

            <div class="buttons">
                <input type="submit" class="button_save" value="Sauver">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>
            
        </form>

    </section>

</main>
<?php
    include("../footer.php");
?>