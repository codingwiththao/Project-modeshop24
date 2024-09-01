<?php
include "header.php";
include "slider.php";
include "class/product-class.php";
?>

<?php 
$product = new product;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST, $_FILES);
    // echo '<pre>';
    // echo print_r($_FILES['product-img-desc']['name']);
    // echo '</pre>';
    $insert_product = $product->insert_product();
}
?>

        <div class="admin-content-right">
            <div class="admin-content-right-product-add">
                <h1>Produkt hinzufügen</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <!--  wenn das Formular Dateien enthält, die hochgeladen werden sollen -->
                    <!-- Ohne dieses enctype, wenn Sie versuchen, eine Datei hochzuladen, 
                     würden die Dateiinhalte nicht korrekt übermittelt werden. -->
                    <label for="">Produktname eingeben <span style="color:red;">*</span></label>
                    <input name="product-name" required type="text">

                    <label for="">Kategorie wählen <span style="color:red;">*</span></label>
                    <select name="cartegory-id" id="cartegory-id">
                        <option value="#">--- Wählen---</option>
                        <?php
                        $show_cartegory = $product->show_cartegory();
                        if($show_cartegory) {
                            while($result = $show_cartegory->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $result['cartegory_id'] ?>"> 
                            <?php echo $result['cartegory_name'] ?> 
                        </option>
                        <?php
                            }
                        }
                        ?>
                    </select>

                    <label for="">Produkttyp wählen <span style="color:red;">*</span></label>
                    <select name="brand-id" id="brand-id">
                        <option value="#">--- Wählen---</option>
                        
                    </select>
                    
                    <label for="">Produktpreis <span style="color:red;">*</span></label>
                    <input name="product-price" required type="text">

                    <label for="">Rabattpreis <span style="color:red;">*</span></label>
                    <input name="product-price-new" required type="text">
                    
                    <label for="">Produktbeschreibung <span style="color:red;">*</span></label>
                    <textarea name="product-desc" required id="product-desc" cols="30" rows="10"></textarea>

                    <label for="">Produktphoto <span style="color:red;">*</span></label>
                    <span style="color: red">
                       <?php 
                       if(isset($insert_product)) {
                        echo ($insert_product);
                       }
                       ?> 
                    </span>
                    <input name="product-img" required type="file">

                    <label for="">Beschreibungsphoto <span style="color:red;">*</span></label>
                    <input name="product-img-desc[]" multiple required type="file">

                    <button type="submit">Hinzufügen</button>
                </form>
            </div>
        </div>
    </section>
</body>


<script>
    CKEDITOR.replace('product-desc', {
    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
</script>

<script>
    $(document).ready(function () {
        $("#cartegory-id").change(function () {
            // alert($(this).val());
            var x = $(this).val();
            $.get("product-add-ajax.php", {cartegory_id: x}, function(data) {
                console.log(data); 
                $("#brand-id").html(data);
            })
        })
    })
</script>
</html>