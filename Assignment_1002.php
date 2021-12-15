<?php
$input = explode(PHP_EOL, file_get_contents('Assignment_1001_input'));

for ($i = 0; $i < count($input); $i++) {
    $input[$i] = str_split($input[$i]);
}
$points = [];
$concatenatedWord = "";
$isCorrupt = false;
for ($i = 0; $i < count($input); $i++) {
    $isCorrupt = false;
    $concatenatedWord = "";
    for ($j = 0; $j < count((array)$input[$i]); $j++) {
        switch ($input[$i][$j]) {
            case ')':
                if (substr($concatenatedWord, -1, 1) == "(") {
                    $concatenatedWord = substr_replace($concatenatedWord, '', -1, 1);
                } else {
                    $isCorrupt = true;
                }
                break;
            case ']':
                if (substr($concatenatedWord, -1, 1) == "[") {
                    $concatenatedWord = substr_replace($concatenatedWord, '', -1, 1);
                } else {
                    $isCorrupt = true;
                }
                break;
            case '}':
                if (substr($concatenatedWord, -1, 1) == "{") {
                    $concatenatedWord = substr_replace($concatenatedWord, '', -1, 1);
                } else {
                    $isCorrupt = true;
                }
                break;
            case '>':
                if (substr($concatenatedWord, -1, 1) == "<") {
                    $concatenatedWord = substr_replace($concatenatedWord, '', -1, 1);
                } else {
                    $isCorrupt = true;
                }
                break;
            default:
                $concatenatedWord .= $input[$i][$j];
                break;
        }
        if ($isCorrupt) {
            break;
        }
    }
    if ($isCorrupt == false) {
        $points[count($points)] = 0;
        $concatenatedWord = str_split($concatenatedWord);
        for ($g = count($concatenatedWord) - 1; $g >= 0; $g--) {
            switch ($concatenatedWord[$g]) {
                case '(':
                $points[count($points) - 1] = $points[count($points) - 1] * 5 + 1;
                    break;
                case '[':
                    $points[count($points) - 1] = $points[count($points) - 1] * 5 + 2;
                    break;
                case '{':
                    $points[count($points) - 1] = $points[count($points) - 1] * 5 + 3;
                    break;
                case '<':
                    $points[count($points) - 1] = $points[count($points) - 1] * 5 + 4;
                    break;
            }
        }
    }
}
sort($points);
$key = (count($points) - 1) / 2; // get key of middle number
echo $points[$key];