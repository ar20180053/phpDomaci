<?php if (!isset($_GET['id'])) {
    header("Location: index.php?msg=invalid");
} ?>
<?php
require "db/DB_korisnik_zanr.php";
require "classes/zanr.php";
require "classes/Filmovi.php";

$rezultatZanr = zanr::getAll($conn);
$rezultat = Filmovi::getAll($conn);

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Izmeni podatke o filmu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/edit.css">

</head>

<body style="font-family:roboto,sans-serif;">
    <div class="container main-form-wrap col-md-4">
        <div class="container py-3" id='editBox' style="background:#e4e4e417;">
            <h2 class='text-center'>Izmeni podatke o filmu</h2><br>
            <div id='msgEdit'></div>
            <form id='editForm' method="post">
                <div class="form-group">
                    <input type="text" id="naziv" name="naziv" placeholder="Unesi naziv filma" class='form-control' required>
                </div>
                <div class="form-group">
                    <input type="text" id="trajanje" name="trajanje" placeholder="Unesi trajanje filma u minutima" class='form-control' required>
                </div>
                <div class="form-group">
                    <select name="zanr" id="zanr" class='form-control'>
                        <?php
                        while ($red = $rezultatZanr->fetch_array()) :
                        ?>
                            <option><?php echo $red["zanr"] ?></option>

                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <center>
                    <input type="submit" value="Izmeni" class='btn update edit-button '>
                    <a href="prikaz.php" class='btn edit-cancel-button'>Vrati se</a>
                </center>
            </form>
            <br>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/edit.js"></script>

</html>