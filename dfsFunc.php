<?php
#modified dfs that checks if two word have common letters and if they do changes the array of used words
function DfsCom($i, $N, $array, $currentWord)
        {
            $flag = false;
            global $used;
            if ($used[$i] == true)
                return;
            $used[$i] = true;
            for ($l = 1; $l < $N; $l++){
                for ($k = 1; $k < strlen($array[$l])-1; $k++){
                    for ($g = 1; $g < strlen($currentWord)-1; $g++){
                        $checkingWord = $array[$l];
                        if (($currentWord[$g] == $checkingWord[$k]) && ($flag == false) && ($used[$l]==false)){
                            $flag = true;
                            $currentWord = $checkingWord;
                            DfsCom($l, $N, $array, $currentWord);
                        }
                    }
                }
            }
        }