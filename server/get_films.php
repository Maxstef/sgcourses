<?php
    require './functions.php';
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    if(isset($_POST['offset']) && isset($_POST['max']) && isset($_POST['sort'])){
        
            $array = get_films();
            if($_POST['sort'] == 'name'){
                sort($array);
                $all_films = array();
                for($i = $_POST['offset']; $i < $_POST['offset'] + $_POST['max']; $i++){
                    if(!isset($array[$i])){
                        break;
                    }
                    $a = explode('.',$array[$i]);
                                        $array_to_push = array();
                                        if(isset($a[0])){
                                                $array_to_push['name'] = $a[0];
                                        }
                                        if(isset($a[1])){
                                                $array_to_push['country'] = $a[1];
                                        }
                                        if(isset($a[2])){
                                                $array_to_push['genre'] = $a[2];
                                        }
                                        if(isset($a[3])){
                                                $array_to_push['year'] = $a[3];
                                        }
                                        if(isset($a[4])){
                                                $array_to_push['budget'] = $a[4];
                                        }
                                        if(isset($a[5])){
                                                $array_to_push['director'] = $a[5];
                                        }
                                        array_push($all_films, $array_to_push); 
                }
                
            }
             if($_POST['sort'] == 'budget'){
                 
                 $all_films_without_offset = array();
                 $all_films = array();
                 foreach($array as $item){
                     $a = explode('.',$item);
                                        $array_to_push = array();
                                        if(isset($a[0])){
                                                $array_to_push['name'] = $a[0];
                                        }
                                        if(isset($a[1])){
                                                $array_to_push['country'] = $a[1];
                                        }
                                        if(isset($a[2])){
                                                $array_to_push['genre'] = $a[2];
                                        }
                                        if(isset($a[3])){
                                                $array_to_push['year'] = $a[3];
                                        }
                                        if(isset($a[4])){
                                                $array_to_push['budget'] = $a[4];
                                        }
                                        if(isset($a[5])){
                                                $array_to_push['director'] = $a[5];
                                        }
                                        array_push($all_films_without_offset, $array_to_push);
                 }
                 usort($all_films_without_offset, function($a, $b){
                        return ($a['budget'] - $b['budget']);
                    });
                for($i = $_POST['offset']; $i < $_POST['offset'] + $_POST['max']; $i++){
                    if(isset($all_films_without_offset[$i])){
                        array_push($all_films, $all_films_without_offset[$i]);
                    }
                    
                }
             }
            
            echo json_encode($all_films, JSON_UNESCAPED_UNICODE);
            
        
    } else {
        echo 'false';
    }
    
    /*
     <?php
                    foreach($all_films as $film){
                        echo "<tr><td>$film[name]</td><td>$film[country]</td><td>$film[genre]</td><td>$film[year]</td><td>$film[budget]</td><td>$film[director]</td></tr>";
                    }
                ?>*/