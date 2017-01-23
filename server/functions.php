<?php

function get_films(){
    if(file_exists('../data/films.txt')){   
            $array = file('../data/films.txt');
    }
    return $array;
}