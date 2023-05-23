<?php
#A function that tries to add words to our chosen array of words
#$N - a words number
#
function CheckNextWord($N, $P,$filename,$takenWords)
{
$filename = __DIR__ . $filename;
global $used;
$used = array();
$array = file($filename);
$currentWord = $array[$N];
$flag = false;
for ($i = 0; $i < $P; $i++){
    array_push($used, false);
}

for ($l = 1; $l < $N; $l++){
    for ($k = 1; $k < strlen($array[$l])-2; $k++){
        for ($g = 1; $g < strlen($currentWord)-2; $g++){
            $checkingWord = $array[$l];
                if (($currentWord[$g] == $checkingWord[$k]) && ($used[$l] == false) && ($currentWord[$g] != ''))
                    if (in_array($currentWord,$takenWords)==false)
                    return ($currentWord);
                $flag = true;
        }
    }
}
    if ($flag == false && $N < $P)
        CheckNextWord($N + 1, $P, $filename,$takenWords);
}