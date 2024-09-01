<?php
include "header.php";
include "slider.php";
include "class/brand-class.php"
?>

<?php
$brand = new brand;
if(!isset($_GET['brand_id']) || $_GET['brand_id'] == NULL) {
    echo "<script> window.location = 'brand-list.php' </script>";
}
else {
    $brand_id = $_GET['brand_id'];
}
    $get_brand = $brand->get_brand($brand_id);
    if($get_brand) {
        $resultA = $get_brand->fetch_assoc();
    }


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_id = $_POST['cartegory-id']; //Wegen name des input in div (unten)
    $brand_name = $_POST['brand-name'];
    $update_brand = $brand->update_brand($cartegory_id, $brand_name, $brand_id);
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
                <h1>Produkttyp bearbeiten</h1>
                <br>
                <form action="" method="post">
                    <select name="cartegory-id" id="">
                        <option value="#">---Kategorie wählen</option>

                        <?php
                        $show_cartegory = $brand->show_cartegory();
                        if ($show_cartegory) {
                            while ($result = $show_cartegory->fetch_assoc()) {
                        ?>
                        <option 
                        <?php if($resultA['cartegory_id'] == $result['cartegory_id']) {echo "SELECTED";} ?>
                        value="<?php echo $result['cartegory_id'] ?>">
                            <?php echo $result['cartegory_name'] ?>
                        </option>
                        <?php
                            }
                        }
                        ?>

                    </select>
                    <br>
                    <input required name="brand-name" type="text" placeholder="Produkttyp name eingeben..."
                    value="<?php echo $resultA['brand_name']; ?>">
                    <button type="submit">Bearbeiten</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>