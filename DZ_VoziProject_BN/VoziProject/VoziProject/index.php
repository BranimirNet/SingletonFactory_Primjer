<?php
require_once __DIR__ . '/Exceptions/ValidationException.php';
require_once __DIR__ . '/Exceptions/VehicleException.php';
require_once __DIR__ . '/Interfaces/IVozi.php';
require_once __DIR__ . '/Vehicles/Vehicle.php';
require_once __DIR__ . '/Vehicles/OsobniAutomobil.php';
require_once __DIR__ . '/Vehicles/Kamion.php';
require_once __DIR__ . '/Vehicles/Autobus.php';
require_once __DIR__ . '/Vehicles/Tramvaj.php';
require_once __DIR__ . '/Drivers/Vozac.php';
require_once __DIR__ . '/Drivers/VozacKategorijaC.php';
require_once __DIR__ . '/Drivers/VozacKategorijaD.php';
require_once __DIR__ . '/Drivers/VozacKategorijaH.php';

use VoziProject\Vehicles\OsobniAutomobil;
use VoziProject\Vehicles\Autobus;
use VoziProject\Vehicles\Kamion;
use VoziProject\Drivers\Vozac;
use VoziProject\Drivers\VozacKategorijaC;
use VoziProject\Drivers\VozacKategorijaD;
use VoziProject\Drivers\VozacKategorijaH;
use VoziProject\Exceptions\ValidationException;
use VoziProject\Exceptions\VehicleException;

try {
    echo "--- Pokušaj kreiranja valjanog vozila ---\n";
    $auto = new OsobniAutomobil('VW Golf', 180, 'ST123A');
    echo $auto->getInfo() . "\n";
} catch (ValidationException $ve) {
    echo "ValidationException: " . $ve->getMessage() . "\n";
}

try {
    echo "--- Pokušaj kreiranja nevaljanog vozila ---\n";
    $br = 300;
    $invalid = new OsobniAutomobil('X', $br, 'ZG123');
} catch (ValidationException $ve) {
    echo "ValidationException: " . $ve->getMessage() . "\n";
}

try {
    echo "--- Vozač B pokušava voziti autobus ---\n";
    $vozacB = new Vozac('Ivan', 'Horvat', 'B');
    $autobus = new Autobus('Iveco Bus', 90, 'ZG345A');
    $vozacB->vozi($autobus);
} catch (VehicleException $ve) {
    echo "VehicleException: " . $ve->getMessage() . "\n";
}




try {
    echo "--- Vozač C vozi kamion ---\n";
    $vozacC = new VozacKategorijaC('Marko', 'Maric');
    $kamion = new Kamion('Scania R', 120, 'ST345RI');
    $vozacC->vozi($kamion);
} catch (Exception $e) {
    echo get_class($e) . ': ' . $e->getMessage() . "\n";
} finally {
    echo "--- Kraj demonstracije ---\n";
}
