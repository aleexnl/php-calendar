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
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#"><span class="fas fa-home"></span> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/new-product.php"><span class="fas fa-plus"></span> Add product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/shopping-cart.php"><span class="fas fa-shopping-cart"></span> Cart</a>
            </li>
            </ul>
        </div>
    </nav>

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
                    echo "<td>$product[0]</td>";
                    echo "<td>$product[1]</td>";
                    echo "<td>", number_format((float)$product[2], 2, ",", " ") . " €", "</td>";
                    echo "<td><a class=\"btn btn-danger\" href=index.php?line=$product[3]><span class=\"fas fa-trash\"></span> Delete</a></td>";
                    echo "</tr>";
                }
                ?>
                <tr class=table-primary>
                    <form action="index.php" method="post">
                        <td>            
                            <input type="text" class="form-control" id="productName" placeholder="Your product" name="productName" required>
                        </td>
                        <td>            
                            <textarea class="form-control" id="productDesc" rows="1" aria-describedby="productDescHelp" placeholder="Cool description" name="productDesc" required></textarea>
                        </td>
                        <td>            
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">€</div>
                                </div>
                            <input type="number" class="form-control" id="productPrice" placeholder="1,50" name="productPrice" required>
                            </div>                    
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary"><span class="fas fa-plus"></span> Add</button> 
                        </td> 
                    </form>
                </tr>
            </tbody> 
        </table> 
    </div> 
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>