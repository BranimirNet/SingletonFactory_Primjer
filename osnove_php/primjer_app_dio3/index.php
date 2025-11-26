<?php 
include "zaglavlje.php"; 
$proizvodi = UcitajPodatke("proizvodi.json");
UpravljajKosaricom();
?>
    <div id="sadrzaj">
        <?php if(isset($_SESSION["user"])):?>
        <h3>Popis proizvoda</h3>
        <table>
        <thead>
            <tr>
                <th>Šifra</th>
                <th>Naziv</th>
                <th>Količina</th>
                <th>Cijena</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($proizvodi as $p):?>
            <tr>
            <td><?php echo $p["sifra"]; ?></td>
            <td><?php echo $p["naziv"]; ?></td>
            <td><?php echo $p["kolicina"]; ?></td>
            <td class="valutaformat"><?php echo number_format($p["cijena"],"2",",","."); ?> €</td>
            <td>
                <a href="?akcija=dodaj&sifra=<?= $p["sifra"]; ?>">Dodaj</a>
                <a href="?akcija=smanji&sifra=<?= $p["sifra"]; ?>">Smanji</a>
            </td>
            </tr>
            <?php endforeach; ?>              
        </tbody>
    </table>


    <h3>Košarica</h3>

        <?php if(!empty($_SESSION["kosarica"])):?>
            <table>
                <thead>
                    <th>Šifra</th>
                    <th>Naziv</th>
                    <th>Količina</th>
                    <th>Cijena</th>
                    <th>Ukupno</th>
                    <th>Akcija</th>
                </thead>
                <tbody>
                    <?php
                    $ukupno=0;
                    foreach($_SESSION["kosarica"] as $sifra=>$kol):
                            $pr=PronadjiProizvod($proizvodi,$sifra);
                            $redUkupno=$kol*$pr["cijena"];
                            $ukupno+=$redUkupno;
                                        
                    ?>
                        <tr>
                            <td><?= $sifra; ?></td>
                            <td><?= $pr["naziv"]; ?></td>
                            <td><?= $kol; ?></td>
                            <td class="valutaformat"><?= $pr["cijena"]; ?> €</td>
                            <td class="valutaformat"><?= $redUkupno; ?> €</td>
                            <td><a href="?akcija=makni&sifra=<?= $sifra; ?>">Makni</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <td colspan="4">Ukupno:</td><td class="valutaformat"><?= number_format($ukupno,"2",",","."); ?> €</td>
                    <td><a href="kupovina.php" class="kupibtn">Kupi</a></td>
                </tr>
            </table>
            <?php else: ?>
            <p>Košarica je prazna</p>
        <?php endif; ?>    

    <?php endif; ?>
    </div>
<?php include "podnozje.php"; ?>