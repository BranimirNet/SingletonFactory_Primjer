<!DOCTYPE html>
<html>
    <head>
        <title>FOR - Primjer 2</title>
    </head>
    <body>

    <?php
        /*
        preko for pelje potrebno je napraviti tablicu množenja:
        Tablica množenja do 5 x 5

        1   2   3   4   5
        2   4   6   8  10
        3   6   9  12  15
        4   8  12  16  20
        5  10  15  20  25
        */
        $limit=5;
        echo "<table border='1'>";
        for($m=1;$m<=$limit;$m++){
            echo "<tr>";
            for($n=1;$n<=$limit;$n++){
                echo "<td>".($m*$n)."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    ?>

    </body>
</html>