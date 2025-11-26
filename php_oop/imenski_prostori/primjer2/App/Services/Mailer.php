<?php 

namespace App\Services;

class Mailer {
    public function sendEmail($to, $subject) {
        echo "<br>Obavijest poslana korisniku" . $to . " with subject: " . $subject;
    }
}



?>