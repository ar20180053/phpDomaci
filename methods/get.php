<?php require_once "../classes/film.php";
if (isset($_GET['id'])) {
    $film = new Film;
    $data = $film->get_row($_GET['id']);
    echo json_encode($data);
}
