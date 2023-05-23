<?php
function GetDiscriptionsWithKeys($filename) {
    $map = array();
    $file = fopen($filename, "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $parts = explode("-", $line);
            if (count($parts) == 2) {
                $key = trim($parts[0]);
                $value = trim($parts[1]);
                $map[$key] = $value;
            }
        }
        fclose($file);
    }
    return $map;
}