<?php
#a function that returns 1 if we can make a crossword with the given words and 0 if we cant
function CrossDfs($N, $filename){
    global $used;
    $filename = __DIR__ .$filename;
    $array = file($filename);
    $currentWord = $array[0];
    for ($i = 0; $i < $N-1; $i++){
        array_push($used, false);
    }
    #a modified Depth-first search that checks if there are identical letters in words 
    function Dfs($i, $N, $array, $currentWord)
    {
        $flag = false;
        global $used;
        if ($used[$i] == true)
            return;
        $used[$i] = true;
        for ($l = 1; $l < $N; $l++){
            for ($k = 1; $k < strlen($array[$l])-1; $k++){
                for ($g = 1; $g < strlen($currentWord)-1; $g++){
                    $checkingWord = $array[$l];
                    if (($currentWord[$g] == $checkingWord[$k]) && ($flag == false) && ($used[$l]==false)){
                        $flag = true;
                        $currentWord = $checkingWord;
                        Dfs($l, $N, $array, $currentWord);
                    }
                }
            }
        }
    }
    
    Dfs(1, $N, $array, $currentWord);
    for ($i = 0; $i < $N; $i++){
        if ($used[$i] == false){
            return 0;
        }
    }
    return 1;
    
}
