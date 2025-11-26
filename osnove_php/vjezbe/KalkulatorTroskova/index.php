
        <?php include "header.php";?>
        
        <link rel="stylesheet" href="stil.css">
<style>
body {
    background-image: url('battleship.jpg');
    background-size: cover;
    background-position: center;
}
</style>
        
        

    <?php
    /*Htio bi napraviti program koji izracunava koliko stete u resursima sam napravio protivniku.
    Napraviti cu varijable za obranu i brodove. Na kraju treba izracunati ukupnu vrijednost.
    */

    include "varijable.php";

    include "funkcije.php";

    $totals = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $totals = IzracunajUkupno($units, $_POST);
}
?>

<h2 style="text-align:center; color: #41230cff;">Kalkulator troškova</h2>

<form method="post">
    <table>
        <tr>
            <th>Jedinica</th>
            <th>Trošak</th>
            <th>Količina</th>
        </tr>
        <?php foreach ($units as $key => $unit): ?>
        <tr>
            <td><?= htmlspecialchars($unit['label']); ?></td>
            <td>
                <?php
                    $troškovi = [];
                    foreach ($unit['cost'] as $res => $cijena) {
                        $troškovi[] = ucfirst($res).": ".$cijena;
                    }
                    echo implode(" / ", $troškovi);
                ?>
            </td>
            <td>
                <input type="number" name="<?= $key; ?>" value="<?= $_POST[$key] ?? 0; ?>" min="0">
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div style="text-align:center; margin-top:15px;">
        <button type="submit">Izračunaj ukupno</button>
    </div>
</form>

<?php include "podnozje.php";?>

<?php if (!empty($totals)): ?>
    <h3 style="text-align:center;">Ukupno potrebno:</h3>
    <ul style="text-align:center; list-style:none; padding:0;">
        <?php foreach ($totals as $res => $val): ?>
            <li><?= ucfirst($res) ?>: <strong><?= number_format($val, 0, ',', '.'); ?></strong></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
