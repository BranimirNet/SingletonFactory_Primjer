<?php

namespace Project\Services;

class JsonDB {
    private static ?JsonDB $instance = null;

    private function __construct() {}

    public static function getInstance(): JsonDB {
        if (self::$instance === null) {
            self::$instance = new JsonDB();
        }
        return self::$instance;
    }

    public function save(string $filename, array $record): void {
        $data = [];
        if (file_exists($filename)) {
            $data = json_decode(file_get_contents($filename), true) ?? [];
        }
        $data[] = $record;
        file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT), LOCK_EX);

        echo "<br>Zapisano u $filename!";
    }
}

?>