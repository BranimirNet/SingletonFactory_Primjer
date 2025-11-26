<?php
// ako je forma poslana
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = isset($_POST['remember']);

    // učitaj JSON datoteku s korisnicima
    $users = json_decode(file_get_contents('userData.json'), true);

    $validUser = null;
    foreach ($users as $u) {
        if ($u['userName'] === $username && $u['password'] === $password) {
            $validUser = $u;
            break;
        }
    }

    if ($validUser) {
        // prijava uspješna – spremi u session
        $_SESSION['username'] = $validUser['userName'];

        // ako je označen "Zapamti me" postavi cookie na 5 minuta
        if ($remember) {
            setcookie('prijava', $validUser['userName'], time() + 300, '/');
        }

        echo "Dobro došao {$validUser['userName']}.";
        exit;
    } else {
        // pogrešna prijava
        echo "Pogrešno korisničko ime ili lozinka. Preusmjeravanje...";
        header("Refresh: 2; url=login.php"); // 2 sekunde pa povratak
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
</head>
<body>
    <form method="post" action="">
        <label>Korisničko ime:
            <input type="text" name="username" required>
        </label><br><br>

        <label>Lozinka:
            <input type="password" name="password" required>
        </label><br><br>

        <label>
            <input type="checkbox" name="remember"> Zapamti me
        </label><br><br>

        <button type="submit">Prijava</button>
    </form>
</body>
</html>