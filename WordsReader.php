<?php
function GetWordsArray($filename) {
    $words = array();
    $file = fopen($filename, "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $parts = explode("-", $line);
            if (count($parts) == 2) {
                $key = trim($parts[0]);
                array_push($words, $key);
            }
        }
        fclose($file);
    }
    return $words;
}