<?php
#Dfs for finding biggest component

function DfsLetters($v, $N, $array, $curNum,$arrayLetters)
{
    $flag = false;
    global $used;
    global $com;
    global $arrayLetters;
    $used[$v] = true;
    array_push($com, $array[$curNum]);
    if (count($array)<3)
        return;
    for ($l = 0; $l < $N; $l++) {
        for ($k = 0; $k < count($arrayLetters[$l]) - 2; $k++) {
            for ($g = 0; $g < count($arrayLetters[$curNum]) - 2; $g++) {
                $checkingWord = $arrayLetters[$l];
                if (($arrayLetters[$curNum][$g] == $checkingWord[$k]) && ($used[$l] == false) && ($arrayLetters[$curNum][$g] != '') && ($checkingWord[$k] != '')) {
                    $flag = true;
                    $arrayLetters[$curNum][$g] = '';
                    $arrayLetters[$l][$k] = '';
                    DfsLetters($l, $N, $array, $l, $arrayLetters);
                }
            }
        }
    }
}