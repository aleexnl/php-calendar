<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once("./connection.php");

    if (isset($_POST["city_name"], $_POST["district"], $_POST["population"], $_POST["country_name"])) {
        $query = "INSERT INTO city (null, '" . $_POST["city_name"] . "',  '" .  $_POST["country_name"] . "', '" . $_POST["district"] . "',  '" . $_POST["population"] . "');";
        echo $query;
        if (mysqli_query($con, $query)) {
            echo "<p>Ciudad añadida correctamente</p>";
        } else {
            echo "<p>Ciudad no añadida</p>";
            echo mysqli_error($con);
        }
    }
    ?>
    <header>
        <a href=".">Home</a>
        <a href="#">Add City</a>
    </header>
    <?php
    $query = "SELECT Name, Code FROM country order by Name;";
    $result = mysqli_query($con, $query);
    if (!$result) {
        $msg = 'Consulta invàlida: ' . mysqli_error($con) . "\n";
        $msg .= 'Consulta realitzada: ' . $query;
        die($msg);
    }
    ?>
    <h1>Add city</h1>

    <form action="" method="POST">
        <label for="country">Country: </label>
        <select name="country_name" id="country">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?= $row["Code"] ?>"><?= $row["Name"] ?></option>
            <?php } ?>
        </select>
        <br><br>
        <label for="city_name">City: </label>
        <input type="text" name="city_name" id="city_name" placeholder="Barcelona" required>
        <br><br>
        <label for="District">District: </label>
        <input type="text" name="district" id="District" placeholder="La mina" required>
        <br><br>
        <label for="population">Population: </label>
        <input type="number" name="population" id="population" placeholder="0" required>
        <br><br>
        <input type="submit" value="Add">
    </form>
</body>

</html>