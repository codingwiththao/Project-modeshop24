<?php
include "header.php";
include "slider.php";
include "class/cartegory-class.php"
?>

<?php 
$cartegory = new cartegory;
if(!isset($_GET['cartegory_id']) || $_GET['cartegory_id'] == NULL) {
    echo "<script> window.location = 'cartegory-list.php' </script>";
}
else {
    $cartegory_id = $_GET['cartegory_id'];
}
    $get_cartegory = $cartegory->get_cartegory($cartegory_id);
    if($get_cartegory) {
        $result = $get_cartegory->fetch_assoc();
    }
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_name = $_POST['cartegory-name']; //Wegen name des input in div (unten)
    $update_cartegory = $cartegory->update_cartegory($cartegory_name, $cartegory_id);
}
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory-add">
                <h1>Kategorie bearbeiten</h1>
                <form action="" method="post">
                    <input required name="cartegory-name" type="text" placeholder="Kategoriename eingeben..." 
                    value="<?php echo $result['cartegory_name'] ?>">
                    <button type="submit">Bearbeiten</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>