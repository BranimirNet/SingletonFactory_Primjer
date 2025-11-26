<!DOCTYPE html>
<html>
<head>
    <?php include"logika_resursa.php";?> 

    <title>Kalkulator resursa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #ff0000ff;
        }

        p {
      color: cyan;        
      font-family: Verdana, sans-serif;
    }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        th, td {
            padding: 12px 20px;
            border: 1px solid #4e0000ff;
        }
        th {
            background-color: #041825ff;
            color: white;
        }
        td {
            background-color: #79a0afff;
            color: #333;
        }
        h2 {
            color: #000000ff;
        }
        h3 {
            color: #522603ff;
        }
        h1 {
            color: #9e0303ff;
        }
    </style>
    <style>
body {
    background-image: url('900_art.jpg');
    background-size: cover;
    background-position: center;
}
</style>

</head>
<body>

<?php include "logika_resursa.php";?>

<h1 style="font-weight:1000;">Kalkulator resursa</h1>

<form method="post">
    <table>
        <tr>
            <th>Unos</th>
            <th>Vrijednost</th>
        </tr>
        <tr>
            <td>Trenutno:</td>
            <td><input type="number" step="any" name="trenutno"
            value="<?php echo $_POST['trenutno'] ?? ''; ?>" required></td>
        </tr>
        <tr>
            <td>Potrebno:</td>
            <td><input type="number" step="any" name="potrebno" 
            value="<?php echo $_POST['potrebno'] ?? ''; ?>" required></td>
        </tr>
        <tr>
            <td>Brzina proizvodnje (po satu):</td>
            <td><input type="number" step="any" name="brzina" 
            value="<?php echo $_POST['brzina'] ?? ''; ?>" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Izračunaj</button>
            </td>
        </tr>
    </table>
</form>


<p style="font-size: 22px; background-color: rgba(98, 88, 245, 0.5);">Ovaj program izracunava koliko dugo vremenski moras cekati da bi stekao zeljenu kolicinu resursa.</p>
<p style="font-size: 22px; background-color: rgba(98, 88, 245, 0.5);">Samo upisi koliko imas (Trenutno), koliko ti je cilj imati (Potrebno) i koliko dobivas ukupno resursa po jednome satu.</p>

<h3 style="font-size: 30px;">OGame, Travian and all resource-based games companion.</h3>

<h2 style="position: fixed; bottom: 0; width: 100%; text-align: center; background-color: rgba(85, 83, 83, 0.5); color: black; margin: 0; padding: 10px;font-size: 30px;font-weight:bold;">BranimirNet</h2>
</body>
</html>