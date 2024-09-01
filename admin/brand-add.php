<?php
include "header.php";
include "slider.php";
include "class/brand-class.php"
?>

<?php
$brand = new brand;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_id = $_POST['cartegory-id']; //Wegen name des input in div (unten)
    $brand_name = $_POST['brand-name'];
    $insert_brand = $brand->insert_brand($cartegory_id, $brand_name);
}
?>

<style>
    select {
        height: 30px;
        width: 200px;
    }
</style>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory-add">
                <h1>Produkttyp hinzufügen</h1>
                <br>
                <form action="" method="post">
                    <select name="cartegory-id" id="">
                        <option value="#">---Kategorie wählen</option>

                        <?php
                        $show_cartegory = $brand->show_cartegory();
                        if ($show_cartegory) {
                            while ($result = $show_cartegory->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $result['cartegory_id'] ?>">
                            <?php echo $result['cartegory_name'] ?>
                        </option>
                        <?php
                            }
                        }
                        ?>

                    </select>
                    <br>
                    <input required name="brand-name" type="text" placeholder="Produkttyp name eingeben...">
                    <button type="submit">Hinzufügen</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>