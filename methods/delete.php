<?php require_once "../classes/film.php";
if (empty($_POST['id'])) {
    echo "Not found";
    die();
} else {
    $film = new Film;
    $film->delete($_POST['id']);
}
