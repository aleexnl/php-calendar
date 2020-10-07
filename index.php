<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Calendario</title>
</head>
<body>
    <table>
        <tr>
            <?php
                $weekDays = ["Lunes", "Martes", "Miercoles", 
                "Jueves", "Viernes", "Sabado", "Domingo"];
                foreach ($weekDays as $key => $weekDay) {
                    echo "<td>$weekDay</td>";
                };
            ?>
        </tr>
        <?php
        echo "<tr>";
        $firstDay = date("w", mktime(0, 0, 0, 1, 1, 2020));
        $dayCounter = 1;
        for ($counter = 0; $counter < $firstDay - 1; $counter++) { 
            echo "<td></td>";
            $dayCounter += 1;
        }
        for ($numDay=1; $numDay < 31; $numDay++) {
            echo "<td>";
            echo "<div>$numDay</div>";
            echo "<div><textarea></textarea></div>";
            echo "</td>";
            if ($dayCounter % 7 == 0) {
                echo "</tr><tr>";
            }
            $dayCounter += 1;
        }
        ?>
    </table>
</body>
</html>