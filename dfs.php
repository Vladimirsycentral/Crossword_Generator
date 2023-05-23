<?php
include_once('dfsFunc.php');
#a function that returns 1 if we can make a crossword with the given words and 0 if we cant
#$N - a number of words that will be taken
#$filename - a name of the file 
class DfsClass
{
    function CrossDfs($N, $filename){
        
        global $used;
        $used = array();
        $filename = __DIR__ .$filename;
        $array = file($filename);
        if(($N<1) || (count($array)<1))
            return 0;
        $currentWord = $array[0];
        for ($i = 0; $i < $N; $i++){
            array_push($used, false);
        }
        #a modified Depth-first search that checks if there are identical letters in words 
        
        
        DfsCom(0, $N, $array, $currentWord);
        for ($i = 0; $i < $N; $i++){
            if ($used[$i] == false){
                return 0;
            }
        }
        return 1;
    }
    
}
