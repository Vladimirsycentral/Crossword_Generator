<?php
function generateCrossword($words, $length) {
    // Sort words by length in descending order
    usort($words, function($a, $b) {
        return strlen($b) - strlen($a);
    });
    
    // Determine length and direction of first word
    $firstWord = array_shift($words);
    
    #$length = strlen($firstWord);
    $direction = rand(0, 1) ? 'a' : 'd';
    
    // Generate crossword grid
    $grid = array();
    for ($i = 0; $i < $length; $i++) {
        $grid[$i] = array_fill(0, $length, '=');
    }
    
    // Place first word in middle of grid
    if ($direction == 'a') {
        $startX = floor(($length - strlen($firstWord)) / 2);
        $startY = floor($length / 2);
        for ($i = 0; $i < strlen($firstWord); $i++) {
            $grid[$startY][$startX + $i] = $firstWord[$i];
        }
    } else {
        $startX = floor($length / 2);
        $startY = floor(($length - strlen($firstWord)) / 2);
        for ($i = 0; $i < strlen($firstWord); $i++) {
            $grid[$startY + $i][$startX] = $firstWord[$i];
        }
    }
    
    // Place remaining words in grid
    foreach ($words as $word) {
       # echo(1);
        $placed = false;
        for ($b = 0; $b < $length*$length; $b++) {
            // Choose random starting position and direction
            $x = rand(0, $length - 1);
            $y = rand(0, $length - 1);
            $direction = rand(0, 1) ? 'a' : 'd';
            
            // Check if word fits in chosen direction
            $fits = true;
            if ($direction == 'a') {
                if ($x + strlen($word) > $length) {
                    $fits = false;
                } else {
                    for ($i = 0; $i < strlen($word); $i++) {
                        if ($grid[$y][$x + $i] != '=' && $grid[$y][$x + $i] != $word[$i]) {
                            $fits = false;
                            break;
                        }
                    }
                }
            } else {
                if ($y + strlen($word) > $length) {
                    $fits = false;
                } else {
                    for ($i = 0; $i < strlen($word); $i++) {
                        if ($grid[$y + $i][$x] != '=' && $grid[$y + $i][$x] != $word[$i]) {
                            $fits = false;
                            break;
                        }
                    }
                }
            }
            
            // Place word in grid if it fits
            if ($fits) {
                if ($direction == 'a') {
                    for ($i = 0; $i < strlen($word); $i++) {
                        $grid[$y][$x + $i] = $word[$i];
                    }
                } else {
                    for ($i = 0; $i < strlen($word); $i++) {
                        $grid[$y + $i][$x] = $word[$i];
                    }
                }
                $placed = true;
                break;
            }
        }
    }
    

    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length; $j++) {
            
            echo($grid[$i][$j]);
        }
        echo ("\n");
      }
}
