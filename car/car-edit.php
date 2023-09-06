<?php
    include("../header.php");

    if(!isset($_GET['id']) || $_GET['id']==null){
        header('location:car-index.php');
        exit;
       }
    
      $id =  $_GET['id'];
    
      require_once('../classe/Crud.php');
    
      $crud = new Crud;
      $selectId = $crud->selectId('car', $id);

      $select = $crud->select('category', 'name');
    
      extract($selectId);    
?>
<main>

    <section>

        <h1>Modifier une Voiture</h1>
        
        <form action="car-update.php" method="post">

            <input type="hidden" name="id" value="<?=$id?>">
            <label>Modèle
                <input type="text" name="model" value="<?=$model?>">
            </label>
            <label>Marque
                <input type="text" name="brand" value="<?=$brand?>">
            </label>        
            <label>Année
                <input type="text" name="year" value="<?=$year?>">
            </label>
            <label>Plaque
                <input type="text" name="license_plate" value="<?=$license_plate?>">
            </label>
            <label>Kilométrage
                <input type="text" name="car_mileage" value="<?=$car_mileage?>">
            </label>
            <label>Catégorie
                <select name="category_id">
                    <option value="0">Sélectionner</option>
                    
                    <?php foreach($select as $row) : ?>
                        <option value="<?=$row['id']?>" <?php if ($row['id'] == $category_id) echo "Selected" ?>>
                            <?=$row['name'] ." [". $row['type'] ."]"?>
                        </option>
                    <?php endforeach ?>
                </select>
            </label>            

            <div class="buttons">
                <input type="submit" class="button_modifier" value="Modifier">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div> 

        </form>

    </section>

</main>
<?php
    include("../footer.php");
?>