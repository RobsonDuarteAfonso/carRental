<?php
    include("../header.php");

    require_once('../classe/Crud.php');
    
    $crud = new Crud;
    $select = $crud->select('category');
        
?>
<main>

    <section>

        <h1>Liste de Catégorie</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th colspan="2">
                        <a href="category-create.php" class="button_add">
                            <span class="material-icons">add</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if (count($select) > 0) :
                        foreach($select as $row) : 
                ?>                
                <tr>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['type']; ?></td>
                    <td>
                        <a href="category-edit.php?id=<?= $row['id']?>" class="button_edit">
                            <span class="material-icons">create</span>
                        </a>
                    </td>
                    <td>
                        <a href="category-confirm.php?id=<?= $row['id']?>" class="button_remove">
                            <span class="material-icons">delete</span>
                        </a>
                    </td> 
                </tr>
                <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td class="data_void" colspan="7">Il n'y a aucune donnée à afficher.</td>
                    </tr>
                <?php endif ?>
              
            </tbody>
        </table>

    </section>

</main>
<?php
    include("../footer.php");
?>