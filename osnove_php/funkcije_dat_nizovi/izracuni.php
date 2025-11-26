<?php

function Uspjeh($prosjek) {
    if ($prosjek==1) {
        return "nedovoljan";
    } elseif ($prosjek>=1.5 && $prosjek<=2.4) {
        return "dovoljan";
    } elseif ($prosjek>=2.5 && $prosjek<=3.4) {
        return "dobar";
    } elseif ($prosjek>=3.5 && $prosjek<=4.4) {
        return "vrlo dobar";
    } elseif ($prosjek>=4.5 && $prosjek<=5) {
        return "izvrstan";
    }
    return "-";
}

function RacunanjeProsjeka(...$ocjene) {

    if (in_array(1, $ocjene)) {
        return 1;
    }
    return round(array_sum($ocjene) / count($ocjene), 2);

}




?>