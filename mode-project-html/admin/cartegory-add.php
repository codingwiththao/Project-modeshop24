<?php
include "header.php";
include "slider.php";
include "class/cartegory-class.php"
?>

<?php
$cartegory = new cartegory;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_name = $_POST['cartegory-name']; //Wegen name des input in div (unten)
    $insert_cartegory = $cartegory->insert_cartegory($cartegory_name);
}
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory-add">
                <h1>Kategorie hinzufügen</h1>
                <form action="" method="post">
                    <input required name="cartegory-name" type="text" placeholder="Kategoriename eingeben...">
                    <button type="submit">Hinzufügen</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>