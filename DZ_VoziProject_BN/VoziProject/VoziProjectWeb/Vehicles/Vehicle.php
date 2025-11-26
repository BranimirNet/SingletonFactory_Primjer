<?php
namespace Vehicles;

use VoziProject\Exceptions\ValidationException;

abstract class Vehicle
{
    protected string $naziv;
    protected string $kategorija;
    protected int $maxBrzina;
    protected string $registracija;
    protected \DateTime $createdAt;

    public function __construct(string $naziv, int $maxBrzina, string $registracija)
    {
        $naziv = trim($naziv);
        if (mb_strlen($naziv) < 2) {
            throw new ValidationException("Naziv mora imati najmanje 2 znaka.");
        }

        if ($maxBrzina > 250 || $maxBrzina <= 0) {
            throw new ValidationException("maxBrzina mora biti između 1 i 250.");
        }

        $registracija = strtoupper(trim($registracija));
        if (!preg_match('/^[A-Z]{2}\d{3,4}[A-Z]{1,2}$/', $registracija)) {
            throw new ValidationException("Neispravan format registracije: {$registracija}");
        }

        $this->naziv = $naziv;
        $this->maxBrzina = $maxBrzina;
        $this->registracija = $registracija;
        $this->createdAt = new \DateTime();
    }

    public function __destruct()
    {
        echo "[Destruktor] Uništavam vozilo: {$this->naziv} ({$this->registracija})\n";
    }

    abstract public function getInfo(): string;

    public function getCategory(): string
    {
        return $this->kategorija;
    }

    public function getNaziv(): string
    {
        return $this->naziv;
    }

    public function getRegistracija(): string
    {
        return $this->registracija;
    }

    public function getMaxBrzina(): int
    {
        return $this->maxBrzina;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public static function getSampleVehicles(): array
    {
        return [
            new OsobniAutomobil('Fiat Punto', 160, 'ST123A'),
            new OsobniAutomobil('BMW 320', 220, 'ZG245DI'),
            new Kamion('Volvo FH', 120, 'ST1234R'),
            new Autobus('Mercedes Tourismo', 100, 'ZG789A'),
            new Tramvaj('Siemens Tram', 80, 'TRM123A'),
        ];
    }

    public static function saveVehiclesToJson(array $vehicles, string $path): void
    {
        $out = [];
        foreach ($vehicles as $v) {
            if ($v instanceof Vehicle) {
                $out[] = [
                    'class' => get_class($v),
                    'naziv' => $v->getNaziv(),
                    'maxBrzina' => $v->getMaxBrzina(),
                    'registracija' => $v->getRegistracija(),
                    'kategorija' => $v->getCategory(),
                    'createdAt' => $v->getCreatedAt()->format(DATE_ATOM),
                ];
            }
        }
        file_put_contents($path, json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
