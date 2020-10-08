<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $catalogueFile = fopen("catalogue.txt", "a") or die("Unable to find catalogue!");
            $newProduct = $_POST['productName'].";".$_POST['productDesc'].";".$_POST['productPrice'];;
            fwrite($catalogueFile, "\n");
            fwrite($catalogueFile, $newProduct);
            fclose($catalogueFile);
        }
    ?>
    <?php
        $catalogueFile = fopen("catalogue.txt", "r") or die("Unable to find catalogue!");
        $catalogue = [];
        while(!feof($catalogueFile)) {
            $catalogLine = fgets($catalogueFile);
            $product = explode(';', $catalogLine);
            array_push($catalogue, $product);
        }
        fclose($catalogueFile);
    ?>
    <table class="table table-striped">
        <thead class="thead-dark">
            <th>Producto</th>
            <th>Descripcion</th>
            <th>Precio</th>
        </thead>
        <tbody>
            <?php
            foreach ($catalogue as $key => $product) {
                echo "<tr>";
                echo "<td>";
                echo $product[0];
                echo "</td>";
                echo "<td>";
                echo $product[1];
                echo "</td>";
                echo "<td>";
                echo number_format((float)$product[2], 2, ",", " ")." €";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            <tr>
                <td>
                    <a class="btn btn-primary" href=pages/new-product.php>Add product</a>
                </td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>