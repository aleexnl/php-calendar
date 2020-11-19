<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <a href=".">Home</a>
        <a href="./new_city.php">Add City</a>
    </header>
    <?php
    require_once("./connection.php");

    $query = "SELECT Code, Code2, Name FROM country order by Name;";
    $result = mysqli_query($con, $query);
    if (!$result) {
        $msg = 'Consulta invàlida: ' . mysqli_error($con) . "\n";
        $msg .= 'Consulta realitzada: ' . $query;
        die($msg);
    }
    ?>
    <h1>Countries</h1>
    <form action="./cities.php" method="POST">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <input type="radio" name="country_code" id="<?= $row["Code"] ?>" value="<?= $row["Code"] ?>">
            <img src="./images/<?= strtolower($row["Code2"]) ?>.png" alt="<?= $row["Code"] ?>" />
            <label for="<?= $row["Code"] ?>"><?= $row["Name"] ?></label>
            <br>
        <?php } ?>
        <br>
        <input type="submit" value="Send">
    </form>
</body>

</html>