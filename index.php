<?php

require "db/DB_korisnik_zanr.php";
require "classes/korisnik.php";

session_start();
if (isset($_POST['ime']) && isset($_POST['prezime'])) {

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnik = new Korisnik(null, $ime, $prezime, null);
    $odg = Korisnik::logInKorisnik($korisnik, $conn);

    if ($odg->num_rows == 1) {
        echo  `
        <script>
        console.log( "Uspešno ste se prijavili");
        </script>
        `;
        $_SESSION['user_id'] = $korisnik->id_korisnika;
        header('Location: prikaz.php');
        exit();
    } else {
        echo `
        <script>
        console.log( "Niste se prijavili!");
        </script>
        `;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Filmoteka logovanje</title>

</head>

<body>
    <div class="content">
        <div class="wrap">
            <div class="wrap-form">
                <div class="form-header">
                    <h1>Dobrodošli</h1>
                    <h2>Unesite kredencijale za logovanje</h2>
                </div>
                <form method="POST" action="#">
                    <div class="form-content">
                        <label class="">Ime</label>
                        <input type="text" name="ime" class="" required>
                        <br>
                        <label for="prezime">Prezime</label>
                        <input type="text" name="prezime" class="" required>
                        <button type="submit" class="login-button" name="submit">Prijavi se</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>