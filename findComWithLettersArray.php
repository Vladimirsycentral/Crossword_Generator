<?php
use phpDocumentor\Reflection\Types\Null_;
#написать тесты!
#Написать пример в гугл док (нарисовать в виде кроссворда)
#Кратко про компоненту связности + ссылка на статью

#Function to find a biggest butch of word from witch we can make a crossword with
include_once('dfsLetters.php');
class ComponentLettersClass
{
function FindBiggestComponentMod($N, $filename)
{

    global $used;
    global $com;
    $used = array();
    $com = array();
    $arrayOfCom = array();
    $maxSize = 0;
    $numb = -1;
    $filename = __DIR__ . $filename;
    $array = file($filename);
    global $arrayLetters;
    $arrayLetters = array();
    
    for ($i = 0; $i < count($array); $i++)
        array_push($arrayLetters, str_split($array[$i]));
    $arrayLettersClone = $arrayLetters;
    if (($N < 1) || (count($array) < 1))
        return 0;
    $currentWord = $array[0];
    for ($i = 0; $i < $N; $i++) {
        array_push($used, false);
    }
    for ($p = 0; $p < $N; ++$p) {
        if (!$used[$p]) {
            $com = array();
            DfsLetters($p, $N, $array, $p,$arrayLetters);
            for ($z = 0; $z < count($com); ++$z)
            array_push($arrayOfCom, $com);
            if (count($com) > $maxSize) {
                $maxSize = count($com);
                $numb = count($arrayOfCom) - 1;
            }
        }
    }
    $g = count($arrayOfCom[$numb]);
    for ($i = 0; $i < $g; ++$i) {
        echo ($arrayOfCom[$numb][$i]);
    }
    return $arrayOfCom[$numb];
}
}