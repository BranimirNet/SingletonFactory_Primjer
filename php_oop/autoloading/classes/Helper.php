<?php

class Helper {
    public static function formatText($txt): string {
        return ucfirst(strtolower($txt));
    }
    public static function korijenBroja($num): float {
        return sqrt($num);
    }
    //napraviti static metodu koja prima indeksirani niz i vraca prosjecnu vrijendnost
    public static function prosjekNiza($niz): float {
        if (count($niz) === 0) {
            return 0;
        }
        $suma = array_sum($niz);
        return $suma / count($niz);
    }
}




?>