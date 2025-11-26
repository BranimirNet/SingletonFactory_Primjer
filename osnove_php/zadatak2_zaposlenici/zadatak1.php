<!DOCTYPE html>
<html>
    <head>
        <title>POST metoda</title>
        <style>
            label{
                display: block;
            }
        </style>
    </head>
    <body>

    <form action="izracun.php" method="POST">
        <label>Broj1:</label>
        <label><input type="text" name="broj1" id="broj1" value=""></label>
        <label>Broj2:</label>
        <label><input type="text" name="broj2" id="broj2" value=""></label>
        <label>Grad:</label>
        <label>
            <select name="operacija" id="operacija">
                <option value="-1">Odaberi</option>
                <option value="z">Zbrajanje</option>
                <option value="o">Oduzimanje</option>
                <option value="m">Množenje</option>
                <option value="d">Dijeljenje</option>
                <option value="ost">Ostatak</option>
            </select>
        </label>
        <label><input type="submit" value="Pošalji"></label>
    </form>
    </body>
</html>