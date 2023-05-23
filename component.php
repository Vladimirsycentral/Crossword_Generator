<?php
use phpDocumentor\Reflection\Types\Null_;
#написать тесты!
#Написать пример в гугл док (нарисовать в виде кроссворда)
#Кратко про компоненту связности + ссылка на статью
#Промежуточный отчёт 2-3 стр формат pdf загрузить курс
#Function to find a biggest butch of word from witch we can make a crossword with
include_once('DfsCom.php');
class ComponentClass
{
function FindBiggestComponent($N, $filename)
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
 

    if (($N < 1) || (count($array) < 1))
        return 0;
    $currentWord = $array[0];
    for ($i = 0; $i < $N; $i++) {
        array_push($used, false);
    }

    for ($i = 0; $i < $N; ++$i)
        $used[$i] = false;
    for ($p = 0; $p < $N; ++$p) {
        if (!$used[$p]) {
            $com = array();

            DfsCompon($p, $N, $array, $array[$p]);
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