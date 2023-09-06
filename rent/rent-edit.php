<?php
    include("../header.php");

    if((!isset($_GET['user_id']) || $_GET['user_id']==null) && (!isset($_GET['car_id']) || $_GET['car_id']==null)){
        header('location:rent-index.php');
        exit;
       }
    
      $userId =  $_GET['user_id'];
      $carId =  $_GET['car_id'];
    
      require_once('../classe/Crud.php');
    
      $crud = new Crud;
      $selectId = $crud->selectDoublePK('rent', $userId, $carId, 'user_id', 'car_id');
      $selectUser = $crud->selectId('user', $userId);
      $selectCar = $crud->selectId('car', $carId);

      extract($selectId);
      extract($selectUser);
      extract($selectCar);    
?>
<main>

    <section>

        <h1>Modifier une Location</h1>
        
        <form action="rent-update.php" method="post">

            <input type="hidden" name="user_id" value="<?=$user_id?>">
            <input type="hidden" name="car_id" value="<?=$car_id?>">

            <label>Client
                <input type="text" name="name" value="<?=$name?>" disabled>
            </label>
            <label>Voiture
                <input type="text" name="model" value="<?=$model." - ".$brand." - ".$license_plate?>" disabled>
            </label>                    
            <label>Debut
                <input type="date" name="start_date_rent" value="<?=$start_date_rent?>">
                <input type="time" name="start_time_rent" value="<?=$start_time_rent?>">
            </label>
            <label>Fin
                <input type="date" name="end_date_rent" value="<?=$end_date_rent?>">
                <input type="time" name="end_time_rent" value="<?=$end_time_rent?>">
            </label>             
            <label>Prix par Jour
                <input type="text" name="price_per_day" value="<?=$price_per_day?>">
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