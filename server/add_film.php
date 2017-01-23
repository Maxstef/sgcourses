<?php

if(isset($_POST['data'])){

    $film = $_POST['data'];
    $new_film = htmlspecialchars($film['name']) . " . " . htmlspecialchars($film['country']) . " . " . htmlspecialchars($film['genre']) . " . " .  htmlspecialchars($film['year']) . " . " . htmlspecialchars($film['budget']) . " . " . htmlspecialchars($film['director']);
    file_put_contents('../data/films.txt', "\r\n" . $new_film, FILE_APPEND);
    echo 'Фільм додано до списку';
}
