<?php
    include("../header.php");

    if(!isset($_GET['id']) || $_GET['id']==null){
        header('location:user-index.php');
        exit;
       }
    
      $id =  $_GET['id'];
    
      require_once('../classe/Crud.php');
    
      $crud = new Crud;
      $selectId = $crud->selectId('user', $id);
    
      extract($selectId);    
?>
<main>

    <section>

        <h1>Modifier un Client</h1>
        
        <form action="user-update.php" method="post">

            <input type="hidden" name="id" value="<?=$id?>">
            <label>Nom
                <input type="text" name="name" value="<?=$name?>">
            </label>
            <label>Adresse
                <input type="text" name="address" value="<?=$address?>">
            </label>        
            <label>Courriel
                <input type="email" name="email" value="<?=$email?>">
            </label>
            <label>Permit
                <input type="text" name="driver_license" value="<?=$driver_license?>">
            </label>
            <label>Expiration
                <input type="date" name="expiration_date" value="<?=$expiration_date?>">
            </label>

            <input type="submit" class="button_save" value="Sauver">

        </form>

    </section>

</main>
<?php
    include("../footer.php");
?>