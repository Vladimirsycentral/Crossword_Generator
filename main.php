<?php
$filename = __DIR__ . '/text.txt';
$array = file($filename);
$N = 3;
$used = array(true);
$CurrentWord = $array[0];


for ($i = 0; $i < $N-1; $i++){
    array_push($used, false);
}
DFS(1, $N, $array, $CurrentWord);
for ($i = 0; $i < $N; $i++){
    if ($used[$i] == false){
        echo 0;
        return;
    }
}
echo 1;

function DFS($i, $N, $array, $CurrentWord)
{
    $flag = false;
    global $used;
    if ($used[$i] == true)
        return;
    $used[$i] = true;
    for ($l = 1; $l < $N; $l++){
        for ($k = 1; $k < strlen($array[$l])-1; $k++){
            for ($g = 1; $g < strlen($CurrentWord)-1; $g++){
                $checkingWord = $array[$l];
                if (($CurrentWord[$g] == $checkingWord[$k]) && ($flag == false) && ($used[$l]==false)){
                    $flag = true;
                    $CurrentWord = $checkingWord;
                    DFS($l, $N, $array, $CurrentWord);
                }
            }
        }
    }
}
