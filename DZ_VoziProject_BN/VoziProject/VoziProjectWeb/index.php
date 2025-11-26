<?php
require_once __DIR__ . '/Vehicles/Vehicle.php';
require_once __DIR__ . '/Vehicles/OsobniAutomobil.php';
require_once __DIR__ . '/Vehicles/Kamion.php';
require_once __DIR__ . '/Vehicles/Autobus.php';
require_once __DIR__ . '/Vehicles/Tramvaj.php';

use Vehicles\Vehicle;
use Vehicles\OsobniAutomobil;
use Vehicles\Kamion;
use Vehicles\Autobus;
use Vehicles\Tramvaj;

$dataFile = __DIR__ . '/vehicles.json';

if (!file_exists($dataFile)) {
    $samples = Vehicle::getSampleVehicles();
    Vehicle::saveVehiclesToJson($samples, $dataFile);
}

$poruka = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tip = $_POST['tip'] ?? '';
    $naziv = $_POST['naziv'] ?? '';
    $maxBrzina = (int)($_POST['maxBrzina'] ?? 0);
    $registracija = $_POST['registracija'] ?? '';

    try {
        switch ($tip) {
            case 'B':
                $v = new OsobniAutomobil($naziv, $maxBrzina, $registracija);
                break;
            case 'C':
                $v = new Kamion($naziv, $maxBrzina, $registracija);
                break;
            case 'D':
                $v = new Autobus($naziv, $maxBrzina, $registracija);
                break;
            case 'H':
                $v = new Tramvaj($naziv, $maxBrzina, $registracija);
                break;
            default:
                throw new \Exception('Nepoznat tip vozila');
        }

        $json = [];
        if (file_exists($dataFile)) {
            $json = json_decode(file_get_contents($dataFile), true) ?: [];
        }

        $json[] = [
            'naziv' => $v->getNaziv(),
            'kategorija' => $v->getCategory(),
            'maxBrzina' => $v->getMaxBrzina(),
            'registracija' => $v->getRegistracija(),
            'createdAt' => $v->getCreatedAt()->format(DATE_ATOM),
        ];

        file_put_contents($dataFile, json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $poruka = 'Vozilo je uspješno dodano.';
    } catch (Exception $e) {
        $poruka = 'Greška: ' . $e->getMessage();
    }
}

$vehicles = json_decode(file_get_contents($dataFile), true) ?: [];
?>
<!doctype html>
<html lang="hr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>VoziProject - web verzija</title>
</head>
<body>
<h1>VoziProject - dodaj vozilo</h1>
<?php if ($poruka): ?>
    <p><strong><?php echo htmlspecialchars($poruka); ?></strong></p>
<?php endif; ?>
<form method="post">
    <label>Tip:
        <select name="tip">
            <option value="B">Osobni (B)</option>
            <option value="C">Kamion (C)</option>
            <option value="D">Autobus (D)</option>
            <option value="H">Tramvaj (H)</option>
        </select>
    </label><br>
    <label>Naziv: <input name="naziv" required></label><br>
    <label>Max brzina: <input name="maxBrzina" type="number" required></label><br>
    <label>Registracija: <input name="registracija" required></label><br>
    <button type="submit">Dodaj</button>
</form>

<h2>Popis vozila (iz vehicles.json)</h2>
<table border="1" cellpadding="6">
    <thead>
    <tr><th>Naziv</th><th>Kategorija</th><th>Max brzina</th><th>Registracija</th><th>CreatedAt</th></tr>
    </thead>
    <tbody>
    <?php foreach ($vehicles as $v): ?>
        <tr>
            <td><?php echo htmlspecialchars($v['naziv'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($v['kategorija'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($v['maxBrzina'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($v['registracija'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($v['createdAt'] ?? ''); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
