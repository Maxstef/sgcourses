<?php

if(isset($_POST['data'])){

    $film = $_POST['data'];
    $new_film = $film['name'] . " . " . $film['country'] . " . " . $film['genre'] . " . " .  $film['year'] . " . " . $film['budget'] . " . " . $film['director'];
    file_put_contents('../data/films.txt', "\r\n" . $new_film, FILE_APPEND);
    echo 'Фільм додано до списку';
}
