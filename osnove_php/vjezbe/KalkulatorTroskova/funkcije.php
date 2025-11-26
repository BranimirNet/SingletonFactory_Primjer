<?php 


function IzracunajUkupno(array $units, array $quantities): array {
    $totals = [];
    foreach ($units as $key => $unit) {
        $q = $quantities[$key] ?? 0;
        foreach ($unit['cost'] as $res => $costPerUnit) {
            $totals[$res] = ($totals[$res] ?? 0) + $costPerUnit * $q;
        }
    }
    return $totals;
}










?>