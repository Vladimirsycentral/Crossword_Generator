<?php
#Dfs for finding biggest component

function DfsCompon($v, $N, $array, $currentWord)
{
    $flag = false;
    global $used;
    global $com;
    $used[$v] = true;
    array_push($com, $currentWord);
    if (count($array)<3)
        return;
    for ($l = 0; $l < $N; $l++) {
        for ($k = 0; $k < strlen($array[$l]) - 2; $k++) {
            for ($g = 0; $g < strlen($currentWord) - 2; $g++) {
                $checkingWord = $array[$l];
                if (($currentWord[$g] == $checkingWord[$k]) && ($used[$l] == false) && ($currentWord[$g] != '')) {
                    $flag = true;
                    $currentWord = $checkingWord;
                    DfsCompon($l, $N, $array, $currentWord);
                }
            }
        }
    }
}