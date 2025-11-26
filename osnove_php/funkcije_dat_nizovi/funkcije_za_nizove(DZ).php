<?php 

function izracunStaza($radnoiskustvo) {

    $danas=new DateTime();
    $datum=new DateTime($radnoiskustvo);
    $razlika=$danas->diff($datum);
    return $razlika->y;
};

function odredivanjeKategorije($staz) {
    if ($staz<=5) {
        return "Junior";
    } 
    elseif ($staz<=10) {
        return "Middle";
    } 
    else {
        return "Senior";
    }
};

function korekcijaPlace($kategorija, $trenutnaPlaca) {
    $min = [
        "Junior"=>2000,
        "Middle"=>2500,
        "Senior"=>3500
    ];
    $nova=max($trenutnaPlaca, $min[$kategorija]);
    return $nova;
};

function postotakPorasta($stara, $nova) {
    if ($nova>$stara) {
        return ($nova-$stara) / $stara;
    } 
    else 
        {return 0;
    }
};

function vjestine($sifra, $vjestine) {
    if (isset($vjestine[$sifra])) {
        return implode(", ", $vjestine[$sifra]);
    }
    return "-";
};


?>