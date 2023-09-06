<?php
    include("../header.php");

    require_once('../classe/Crud.php');
    
    $crud = new Crud;
    $select = $crud->select('user');
        
?>
<main>

    <section>

        <h1>Liste de Client</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Courriel</th>
                    <th>Adresse</th>
                    <th>Permis</th>
                    <th>Expiration</th>
                    <th colspan="2">
                        <a href="user-create.php" class="button_add">
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
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['driver_license'] ?></td>
                    <td><?= $row['expiration_date'] ?></td>
                    <td>
                        <a href="user-edit.php?id=<?= $row['id']?>" class="button_edit">
                            <span class="material-icons">create</span>
                        </a>
                    </td>
                    <td>
                        <a href="user-confirm.php?id=<?= $row['id']?>" class="button_remove">
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