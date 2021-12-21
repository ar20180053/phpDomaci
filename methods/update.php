<?php require_once "../classes/film.php";
if (empty($_POST['id'])) {
    echo "Not found";
    die();
} else {
    $film = new Film;
    $film->update($_POST['naziv'], $_POST['zanr'], $_POST['trajanje'], $_POST['id']);
}
