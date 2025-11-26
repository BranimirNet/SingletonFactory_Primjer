<!DOCTYPE html>
<html>
    <head>
        
        <title>Domaca zadaca - petlje</title>
    </head>
    <body>
        <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .prolaz {
            background-color: green;
            color: white;
        }
        .pad {
            background-color: lightgray;
        }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Životinja</th>
            <th>Bodovi</th>
            <th>Prolaz / Pad</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $zivotinje = ["Lav", "Tigar", "Slon", "Zebra", "Konj", "Pas", "Mačka", "Medvjed", "Vuk", "Krokodil"];
        $i = 0;

        while ($i < 10) {
            $bodovi = rand(5, 20); // slučajni broj od 5 do 20

            if ($bodovi > 15) {
                $status = "Prolaz";
                $klasa = "prolaz";
            } else {
                $status = "Pad";
                $klasa = "pad";
            }

            echo "<tr class='$klasa'>";
            echo "<td>" . $zivotinje[$i] . "</td>";
            echo "<td>" . $bodovi . "</td>";
            echo "<td>" . $status . "</td>";
            echo "</tr>";

            $i++;
        }
        ?>
    </tbody>

    </body>
</html>