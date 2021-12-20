<?php
require "db/DB_korisnik_zanr.php";
require "classes/Filmovi.php";
require "classes/zanr.php";

$rezultatZanr = zanr::getAll($conn);
$rezultat = Filmovi::getAll($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glavna strana</title>
    <link rel="stylesheet" type="text/css" href="css/prikaz.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


</head>

<body>
    <div class="wrap">
        <div class="table-wrap">
            <table class="table table-hover" id="table">
            </table>
        </div>
    </div>

    <div class="container col-md-4">
        <div class="container form-style py-3">
            <h2 class='text-center form-header'>Unesi novi film</h2><br>
            <form id='insertForm' method="post">
                <!-- regForm bitan za js fajl -->
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

                <input type="submit" value="Unesi film" class='submit-button'>
            </form>
            <br>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/main.js"></script>

</html>