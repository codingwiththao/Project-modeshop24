<?php
include "header.php";
include "slider.php";
include "class/brand-class.php"
?>

<?php
$brand = new brand;
$show_brand = $brand->show_brand();
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory-list">
                <h1>Kategorieliste</h1>
                <table>
                    <tr>
                        <th>Ordnungszahl</th>
                        <th>ID</th>
                        <th>Kategorie</th>
                        <th>Kategoriename</th>
                        <th>Anpassung</th>
                    </tr>
                    <?php
                    if($show_brand) {$i=0;
                        while($result = $show_brand->fetch_assoc()) {$i++;
                    ?>


                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['brand_id'] ?></td>
                        <td><?php echo $result['cartegory_name'] ?></td>
                        <td><?php echo $result['brand_name'] ?></td>
                        <td>
                            <a href="brand-edit.php?brand_id=<?php echo $result['brand_id'] ?>">Bearbeiten</a>
                            |
                            <a href="brand-delete.php?brand_id=<?php echo $result['brand_id'] ?>">Entfernen</a>
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