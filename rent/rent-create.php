<?php
    include("../header.php");

    require_once('../classe/Crud.php');
    
    $crud = new Crud;
    $selectUsers = $crud->select('user', 'name');
    $selectCars = $crud->select('car', 'model');
?>
<main>

    <section>

        <h1>Créer une Location</h1>
        
        <form action="rent-store.php" method="post">

            <label>Client
                <select name="user_id">
                    <option value="0">Sélectionner</option>
                    
                    <?php foreach($selectUsers as $rowUser) : ?>
                        <option value="<?=$rowUser['id']?>"><?=$rowUser['name']?></option>
                    <?php endforeach ?>
                </select>
            </label>
            <label>Voiture
                <select name="car_id">
                    <option value="0">Sélectionner</option>
                    
                    <?php foreach($selectCars as $rowCar) : ?>
                        <option value="<?=$rowCar['id']?>"><?=$rowCar['model'] ." - ". $rowCar['brand'] ?></option>
                    <?php endforeach ?>
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
<?php
    include("../footer.php");
?>