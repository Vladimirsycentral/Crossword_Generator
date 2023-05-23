<?php
use phpDocumentor\Reflection\Types\Null_;
#Function to find a biggest butch of word from witch we can make a crossword with
include_once('Place.php');
class ComponentGridClass
{
    function generateCrosswordGrid($words, $size) {
        // Determine the size of the grid based on the length of the longest word
        #$size = strlen(max($words, function($a, $b) {
        #  return strlen($a) - strlen($b);
        #}));
      
        // Create an empty grid
        $grid = array();
        for ($i = 0; $i < $size; $i++) {
          for ($j = 0; $j < $size; $j++) {
            $grid[$i][$j] = '';
          }
        }
      
        foreach ($words as $word) {
          echo($word);
          for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j <= $size - strlen($word); $j++) {
              $match = true;
              for ($k = 0; $k < strlen($word); $k++) {
                if ($grid[$i][$j + $k] != '' && $grid[$i][$j + $k] != $word[$k]) {
                  $match = false;
                  break;
                }
              }
              if ($match) {
                for ($k = 0; $k < strlen($word); $k++) {
                  $grid[$i][$j + $k] = $word[$k];
                }
                break;
              }
            }
          }
      
          for ($j = 0; $j < $size; $j++) {
            for ($i = 0; $i <= $size - strlen($word); $i++) {
              $match = true;
              for ($k = 0; $k < strlen($word); $k++) {
                if ($grid[$i + $k][$j] != '' && $grid[$i + $k][$j] != $word[$k]) {
                  $match = false;
                  break;
                }
              }
              if ($match) {
                for ($k = 0; $k < strlen($word); $k++) {
                  $grid[$i + $k][$j] = $word[$k];
                }
                break;
              }
            }
          }
        }
      
        // Fill in the empty cells with random letters
        #$alphabet = range('A', 'Z');
        #for ($i = 0; $i < $size; $i++) {
        #  for ($j = 0; $j < $size; $j++) {
        #    if ($grid[$i][$j] == '') {
        #      $grid[$i][$j] = $alphabet[array_rand($alphabet)];
        #    }
        #  }
        #}
        return $grid;
}

}