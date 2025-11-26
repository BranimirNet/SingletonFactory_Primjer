<?php 

namespace App\Services;

class Logger {
    public function log($text) {
        echo "<br>Log entry: " . $text;
    }

}

?>