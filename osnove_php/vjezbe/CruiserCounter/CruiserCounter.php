<!DOCTYPE html>
<html>
<head>

    <title>Cruiser counter</title>
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
            color: #27036bff;
        }
    </style>
    <style>
body {
    background-image: url('the-art.jpeg');
    background-size: cover;
    background-position: center;
}
</style>

</head>
<body>

<?php include "logika.php";?>

<h1 style="font-weight:1000;">Cruiser Counter</h1>

<form method="post">
    <table>
        <tr>
            <th>Unos</th>
            <th>Vrijednost</th>
        </tr>
        <tr>
            <td>Metala:</td>
            <td><input type="number" step="any" name="metala"
            value="<?php echo $_POST['metala'] ?? ''; ?>" required></td>
        </tr>
        <tr>
            <td>Kristala:</td>
            <td><input type="number" step="any" name="kristala" 
            value="<?php echo $_POST['kristala'] ?? ''; ?>" required></td>
        </tr>
        <tr>
            <td>Deuterija:</td>
            <td><input type="number" step="any" name="deuterija" 
            value="<?php echo $_POST['deuterija'] ?? ''; ?>" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Izračunaj</button>
            </td>
        </tr>
    </table>
</form>


<h2 style="position: fixed; bottom: 0; width: 100%; text-align: center; background-color: rgba(85, 83, 83, 0.5); color: black; margin: 0; padding: 10px;font-size: 30px;font-weight:bold;">BranimirNet</h2>
</body>
</html>