<?php
include "header.php";
include "slider.php";
include "class/cartegory-class.php"
?>

<?php
$cartegory = new cartegory;
$show_cartegory = $cartegory->show_cartegory();
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory-list">
                <h1>Kategorieliste</h1>
                <table>
                    <tr>
                        <th>Ordnungszahl</th>
                        <th>ID</th>
                        <th>Kategoriename</th>
                        <th>Anpassung</th>
                    </tr>
                    <?php
                    if($show_cartegory) {$i=0;
                        while($result = $show_cartegory->fetch_assoc()) {$i++;
                    ?>


                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['cartegory_id'] ?></td>
                        <td><?php echo $result['cartegory_name'] ?></td>
                        <td>
                            <a href="cartegory-edit.php?cartegory_id=<?php echo $result['cartegory_id'] ?>">Bearbeiten</a>
                            |
                            <a href="cartegory-delete.php?cartegory_id=<?php echo $result['cartegory_id'] ?>">Entfernen</a>
                        </td>
                    </tr>
                    <?php
                    }
                }
                    ?>

                </table>
            </div>
        </div>
    </section>
</body>
</html>