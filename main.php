<?php
#main body
$outputfile = 'output.txt';
$x=4;
require_once('makeAGrid.php');
require_once('FindComWithLettersArray.php');
require_once('component.php');
require_once('dfs.php');
require_once('NextWord.php');
require_once('component.php');
require_once('findComWithLettersArray.php');

$used = array(true);
$buf = new DfsClass();
$d = $buf->CrossDfs($x, '/text.txt');
echo ("Наибольшая компонента");
$buf = new ComponentClass();
$takenWords = $buf->FindBiggestComponent(9, '/text5.txt');
//$d = CrossDfs($x, '/text2.txt');
echo ("\n");
$buf = new ComponentLettersClass();
$Words = $buf->FindBiggestComponentMod(9, '/text.txt');
echo ("\n");
echo ("слова");
#$cur = CheckNextWord(7, 8, '/text.txt', $takenWords);
#echo ($cur);
file_put_contents($outputfile, $d);
echo ($d);
echo ("\n");
echo ("++++++++++++++++");
for ($i = 0; $i < 4; $i++) {
    echo($Words[$i]);
}
echo ("---------------");
echo ("\n");
$buf = new ComponentGridClass();
$test = $buf->generateCrosswordGrid($Words, 12);

#if($test)
#    echo("Yes");
#else
#    echo("no");
for ($i = 0; $i < 12; $i++) {
    for ($j = 0; $j < 12; $j++) {
        echo($test[$i][$j]);
    }
  }
