<?php 

require "src/App/User.php";
require "src/App/vendor/Lib/User.php";

echo "<h2>Puno kvalificirano ime (FQN)</h2>";

echo (new \App\User())->whoami();
echo (new \Lib\User())->whoami();

echo"<h2>Import + alias</h2>";

use App\User as AppUser;
use Lib\User as LibUser;

echo (new AppUser())->whoami();
echo (new LibUser())->whoami();

echo "<h2>Standardni nacin - instanciranje klase</h2>";
$us1 = new AppUser();
echo $us1->whoami();

$us2 = new LibUser();
echo $us2->whoami();



?>