<?php

//napraviti interface notifier za obaviještavanje odnosno slanje obavijesti. interface će imati predefiniranu metodu send koja prima jedan ulazni parametar tipa string
//napraviti dvije klase koje će implementirati sučelje: EmailNotifier te SmsNotifier. 
//napraviti factory koji će pozivati automatsko kreiranje klasa ovisno o prosljeđenom parametru (email,sms)

interface Notifier{
    public function send(string $message);
}

class EmailNotifier implements Notifier{

    public function send(string $message){
        echo "<br>Email uspješno poslan sa porukom ".$message;
    }
}

class SMSNotifier implements Notifier{
    public function send(string $message){
        echo "<br>SMS uspješno poslan sa porukom ".$message;
    }

    public function call(int $number){
        echo "<br>Zovem broj: ".$number;
    }
}

class NotifierFactory{

    public static function create(string $channel): Notifier{
        return match ($channel){
            "email" => new EmailNotifier(),
            "sms" => new SMSNotifier(),
            default => throw new Exception("Nepoznat kanal komunikacije")
        };
    }
}

$n1 = NotifierFactory::create("email");
$n2 = NotifierFactory::create("sms");

$n1->send("Dobili ste mail");
$n2->send("Dobili ste sms");
//$n2->call(192); - možemo koristiti samo kada static metoda u factory-u nije return type definirana
?>