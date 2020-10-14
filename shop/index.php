<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    $file_lines = file("catalogue.txt");

    // GET METHOD
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['line'])) {
            unset($file_lines[$_GET['line']]);
            update_file($file_lines);
        }
    }
    // POST METHOD
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['productName'], $_POST['productDesc'], $_POST['productPrice'])) {
            $newProduct = $_POST['productName'] . ";" . $_POST['productDesc'] . ";" . $_POST['productPrice'] . "\n";
            array_push($file_lines, $newProduct);
            update_file($file_lines);
        }
    }
    ?>
    <?php
    function update_file($file_lines)
    {
        $catalogueFile = fopen("catalogue.txt", "w") or die("Unable to find catalogue!");
        foreach ($file_lines as $key => $file_line) {
            fwrite($catalogueFile, $file_line);
        }
    }
    ?>
    <?php
    $catalogue = [];
    foreach ($file_lines as $key => $file_line) {
        $product = explode(';', $file_line);
        array_push($product, $key);
        array_push($catalogue, $product);
    }

    ?>
    <div class="table-responsive">
        <table class="table table-hover">
            <caption>Products list</caption>
            <thead class="thead-dark">
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                foreach ($catalogue as $key => $product) {
                    if ($key == count($catalogue) - 1) {
                        echo "<tr class=table-primary>";
                    } else {
                        echo "<tr>";
                    }
                    echo "<td>$product[0]</td>";
                    echo "<td>$product[1]</td>";
                    echo "<td>", number_format((float)$product[2], 2, ",", " ") . " €", "</td>";
                    echo "<td><a class=\"btn btn-danger\" href=index.php?line=$product[3]><span class=\"fas fa-trash\"></span> Delete</a></td>";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td colspan="4"><a class="btn btn-primary" href=pages/new-product.php>Add product</a> </td> </tr> </tbody> </table> </div> <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                            <script src="js/bootstrap.min.js"></script>
</body>

</html>