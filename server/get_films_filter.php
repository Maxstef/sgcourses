<?php
    require './functions.php';
if(isset($_POST['string'])){
    $array = get_films();
    $pattern = '/' . $_POST['string'] . '/i';
    $array_to_return = array();
    foreach($array as $item){
        $a = explode('.',$item);
        if(preg_match($pattern, $a[0])){
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
                                        array_push($array_to_return, $array_to_push); 
            
        }
    }
    echo json_encode($array_to_return, JSON_UNESCAPED_UNICODE);
}

