<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Comaptible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<?php
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username == "admin" && $password == "tajna") {
    echo "<h3>Dobrodosao, $username!</h3>";
} else {
    echo "<h3>Pogresno korisnicko ime ili lozinka.</h3>";
}
?>
</body>
</html>