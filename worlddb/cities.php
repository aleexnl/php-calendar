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
    <h1>Cities</h1>
    <table>
        <thead>
            <tr>
                <th>Country</th>
                <th>City</th>
                <th>Population</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once("./connection.php");
            if (isset($_POST["country_code"])) {
                $query = "SELECT country.Name as Country, city.Name, city.Population FROM city RIGHT JOIN country ON city.CountryCode=country.Code WHERE CountryCode = '" . $_POST["country_code"] . "' order by city.Name ;";
                $result = mysqli_query($con, $query);
                if (!$result) {
                    $msg = 'Consulta invàlida: ' . mysqli_error($con) . "\n";
                    $msg .= 'Consulta realitzada: ' . $query;
                    die($msg);
                }
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row["Country"] ?></td>
                        <td><?= $row["Name"] ?></td>
                        <td><?= $row["Population"] ?></td>
                    </tr>
                <?php } // Close While 
                ?>
        </tbody>
    </table>
<?php } // Close If
?>


</body>

</html>