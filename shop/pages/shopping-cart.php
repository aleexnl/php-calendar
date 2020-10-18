<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = [];
    }
    $file_lines = file("../catalogue.txt");
    $catalogue = [];
    foreach ($file_lines as $key => $file_line) {
        $product = explode(';', $file_line);
        array_push($product, $key);
        array_push($catalogue, $product);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['productId'], $_GET['productQty'])) {
            $product = $catalogue[$_GET['productId']];
            array_push($product, $_GET['productQty']);
            array_push($_SESSION["shopping_cart"], $product );
        }
        if (isset($_GET['line'])) {
            unset($_SESSION["shopping_cart"][$_GET['line']]);
        }
    }
    // print_r($_SESSION["shopping_cart"]);
    ?>
    
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../index.php"><span class="fas fa-home"></span> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="new-product.php"><span class="fas fa-plus"></span> Add product</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#"><span class="fas fa-shopping-cart"></span> Cart</a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="table-responsive">
        <table class="table table-hover">
            <caption>Shopping cart</caption>
            <thead class="thead-dark">
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                    foreach ($_SESSION["shopping_cart"] as $key => $product) {
                        echo "<tr>";
                        echo "<td>$product[0]</td>";
                        echo "<td>", number_format((float)$product[2], 2, ",", " ") . " €", "</td>";
                        echo "<td>$product[4]</td>";
                        echo "<td><a class=\"btn btn-danger\" href=shopping-cart.php?line=$key><span class=\"fas fa-trash\"></span> Delete</a></td>";
                        echo "</tr>";
                    }
                ?>
                <tr class=table-primary>
                    <form action="shopping-cart.php" method="get">
                        <td colspan="2">            
                            <select class="form-control" id="selectProduct" name="productId">
                                <?php
                                foreach ($catalogue as $key => $product) {
                                    echo "<option value=$key>$product[0] | $product[2]€/Unidad</option>";
                                }
                                ?>
                            </select>                        
                        </td>
                        <td>            
                            <input type="number" class="form-control" id="productQty" placeholder="1" name="productQty" step="1" required>                   
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary"><span class="fas fa-plus"></span> Add</button> 
                        </td> 
                    </form>
                </tr>
            </tbody> 
        </table> 
    </div> 

    
</body>
</html>