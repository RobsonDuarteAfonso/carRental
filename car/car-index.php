<?php
    include("../header.php");

    require_once('../classe/Crud.php');
    
    $crud = new Crud;
    $select = $crud->select('car');
?>
<main>

    <section>

        <h1>Liste de Voitures</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Modèle</th>
                    <th>Marque</th>
                    <th>Année</th>
                    <th>Plaque</th>
                    <th>Kilométrage</th>
                    <th>Catégorie</th>
                    <th colspan="2">
                        <a href="car-create.php" class="button_add">
                            <span class="material-icons">add</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if (count($select) > 0) :
                        foreach($select as $row) : 

                            $selectId = $crud->selectId('category', $row['category_id']);
                          
                            extract($selectId);
                ?>                
                <tr>
                    <td><?= $row['model'] ?></td>
                    <td><?= $row['brand'] ?></td>
                    <td><?= $row['year'] ?></td>
                    <td><?= $row['license_plate'] ?></td>
                    <td><?= $row['car_mileage'] ?></td>
                    <td><?= $name ?></td>
                    <td>
                        <a href="car-edit.php?id=<?= $row['id']?>" class="button_edit">
                            <span class="material-icons">create</span>
                        </a>
                    </td>
                    <td>
                        <a href="car-confirm.php?id=<?= $row['id']?>" class="button_remove">
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