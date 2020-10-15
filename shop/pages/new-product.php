<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
</head>

<body>
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
            <li class="nav-item active">
                <a class="nav-link" href="#"><span class="fas fa-plus"></span> Add product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shopping-cart.php"><span class="fas fa-shopping-cart"></span> Cart</a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-4 mb-4">New product</h1>
        <form action="../index.php" method="post">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" placeholder="Banana" name="productName" required>
            </div>
            <div class="form-group">
                <label for="productDescription">Description</label>
                <textarea class="form-control" id="productDesc" rows="3" aria-describedby="productDescHelp" placeholder="This pretty cool Canarian banana will leave your stomach so happy." name="productDesc" required></textarea>
                <small id="productDescHelp" class="form-text text-muted">A little description for your product to show your customers.</small>
            </div>
            <div class="form-group">
                <label for="productPrice">Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">€</div>
                    </div>
                    <input type="number" class="form-control" id="productPrice" placeholder="1,50" name="productPrice" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>