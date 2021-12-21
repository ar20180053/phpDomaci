<?php require_once "../classes/film.php";
if (!empty($_POST)) {
    $film = new Film;
    $film->insert($_POST['naziv'], $_POST['zanr'], $_POST['trajanje']);
}
