<?php

/*
potrebno je kreirati klasu User koja će u sebi imati implementiranu metodu role koja će vratiti vrijednost Običan korisnik. zatim je potrebno kreirati još dvije dodatne klase: AdminUser i GuestUser koje će nasljediti klasu User i koristiti njenu metodu koja će vratiti određene vrijednosti (Administrator ili Gost)
potrebno je napraviti factory koji će imati return type klase User te isprobati na 3 primjera.
ukoliko kod provjere tipa klase ne pronađe odgovarajući tip, vratiti defaultn-u klasu (User)
*/
namespace Factory;
class User{
    public function role(){
        return "Običan korisnik";
    }
    
    public function opis(){
        return "";
    }
}

class AdminUser extends User{
    public function role(){
        return "Administrator";
    }

    public function opis(){
        return "Ova rola ima sve ovlasti";
    }
}

class GuestUser extends User{
    public function role(){
        return "Gost";
    }
}

class UserFactory{

    public static function create(string $tip): User{
        return match($tip){
            "admin" => new AdminUser(),
            "guest" => new GuestUser(),
            default => new User()
        };
    }
}

$u1 = UserFactory::create("admin");
$u2 = UserFactory::create("guest");
$u3 = UserFactory::create("other");

echo "<br>Prva rola: ".$u1->role();
echo "<br>Druga rola: ".$u2->role();
echo "<br>Treća rola: ".$u3->role();

echo "<br>Ovlasti: ".$u1->opis();
?>