<?php
    include("../header.php");

    require_once('../classe/Crud.php');
    
    $crud = new Crud;
    $select = $crud->selectInnerJoin('rent', 'car', 'user', 'start_date_rent');
?>
<main>

    <section>

        <h1>Liste de Location</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Voiture</th>
                    <th>Marque</th>
                    <th>Plaque</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th>Prix par Jour</th>
                    <th colspan="2">
                        <a href="rent-create.php" class="button_add">
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
                    <td><?= $row['model'] ?></td>
                    <td><?= $row['brand'] ?></td>
                    <td><?= $row['license_plate'] ?></td>                    
                    <td><?= $row['start_date_rent'] ." ". $row['start_time_rent'] ?></td>
                    <td><?= $row['end_date_rent'] ." ". $row['end_time_rent'] ?></td>
                    <td><?= $row['price_per_day'] ?></td>
                    <td>
                        <a href="rent-edit.php?user_id=<?= $row['user_id']?>&car_id=<?= $row['car_id']?>" class="button_edit">
                            <span class="material-icons">create</span>
                        </a>
                    </td>
                    <td>
                        <a href="rent-confirm.php?user_id=<?= $row['user_id']?>&car_id=<?= $row['car_id']?>" class="button_remove">
                            <span class="material-icons">delete</span>
                        </a>
                    </td> 
                </tr>
                <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td class="data_void" colspan="8">Il n'y a aucune donnée à afficher.</td>
                    </tr>
                <?php endif ?>
              
            </tbody>
        </table>

    </section>

</main>
<?php
    include("../footer.php");
?>