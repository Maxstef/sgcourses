<?php

if(isset($_POST['data'])){
    $film = $_POST['data'];
    if(preg_match('/\./i', $film['name']) || preg_match('/\./i', $film['country']) || preg_match('/\./i', $film['genre']) || preg_match('/\./i', $film['year']) || preg_match('/\./i', $film['director']) || preg_match('/\./i', $film['budget'])){
        echo 'Назва не може містити крапку';
        return;
    }
    if(!is_numeric($film['budget'])){
        echo 'Бюджет число';
        return;
    }
    if($film['year'] < 1900 || $film['year'] > 2020){
        echo 'Рік стрьомний';
        return;
    }
    $new_film = htmlspecialchars($film['name']) . " . " . htmlspecialchars($film['country']) . " . " . htmlspecialchars($film['genre']) . " . " .  htmlspecialchars($film['year']) . " . " . htmlspecialchars($film['budget']) . " . " . htmlspecialchars($film['director']);
    file_put_contents('../data/films.txt', "\r\n" . $new_film, FILE_APPEND);
    echo 'Фільм додано до списку';
}
