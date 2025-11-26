<!DOCTYPE html>
<html>
    <head>
        <title>Zadaća</title>
        <style>
            table {
                width: 60%;
                border-collapse: collapse;
                background-color: #fff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                font-size: 12px;
                margin-top: 20px
            }

            th, td {
                padding: 10px;
                border: 1px solid #ccc;
                text-align: left;
            }

            th {
                background-color: #4e5bcaff;
                color: #fff;
            }

            .prolaz{
                background-color: greenyellow;
            }

            .pad{
                background-color: grey;
            }

        </style>
    </head>
    <body>
             <table>
                <thead>
                    <tr>
                        <th>Životinja</th>
                        <th>Bodovi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $br=1;
                    $prolaz=0;
                    while($br<=10){
                        $bodovi=rand(5,20);
                        if($bodovi>15){
                            $status="Prolaz";
                            $klasa="prolaz";
                            $prolaz++;
                        }
                        else
                        {
                            $status="Pad";
                            $klasa="pad";
                        }
                      ?>
                      <tr class="<?php echo $klasa;?>">
                        <td><?php echo "Životinja br. ".$br; ?></td>
                        <td><?php echo $bodovi; ?></td>
                        <td><?php echo $status; ?></td>
                      </tr>
                      <?php
                      $br++;
                    }
                    ?>
                </tbody>
             </table>
             <?php
                echo "<p>Ukupno životinja koje su prošle: ".$prolaz."</p>";
             ?>
    </body>
</html>