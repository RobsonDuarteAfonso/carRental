<?php
    include("../header.php");

    if(!isset($_GET['id']) || $_GET['id']==null){
        header('location:category-index.php');
        exit;
       }
    
      $id =  $_GET['id'];
    
      require_once('../classe/Crud.php');
    
      $crud = new Crud;
      $selectId = $crud->selectId('category', $id);
    
      extract($selectId);    
?>
<main>

    <section>

        <h1>Supprimer une Catégorie</h1>
        
        <form action="category-delete.php" method="post">

            <input type="hidden" name="id" value="<?=$id?>">
            <label>Nom
                <input type="text" name="name" value="<?=$name?>" disabled>
            </label>
            <label>Type
                <input type="text" name="type" value="<?=$type?>" disabled>
            </label>        

            <div class="buttons">
                <input type="submit" class="button_delete" value="Supprimer">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>

        </form>

    </section>

</main>
<?php
    include("../footer.php");
?>