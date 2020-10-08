<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
    <h1 class="mt-4 mb-4">New product</h1>
        <form action="../index.php" method="post">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" placeholder="Banana" name="productName">
            </div>
            <div class="form-group">
                <label for="productDescription">Description</label>
                <textarea class="form-control" id="productDesc" rows="3" aria-describedby="productDescHelp" placeholder="This pretty cool Canarian banana will leave your stomach so happy." name="productDesc"></textarea>                
                <small id="productDescHelp" class="form-text text-muted">A little description for your product to show your customers.</small>
            </div>
            <div class="form-group">
                <label for="productPrice">Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">€</div>
                    </div>
                    <input type="number" class="form-control" id="productPrice" placeholder="1,50" name="productPrice">
                </div>
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>