<?php
$input = explode(PHP_EOL, file_get_contents('Assignment_1001_input'));

for ($i = 0; $i < count($input); $i++) {
    $input[$i] = str_split($input[$i]);
}
$points = 0;
$concatenatedWord = "";
$stopRunning = false;
for ($i = 0; $i < count($input); $i++) {
    $stopRunning = false;
    $concatenatedWord = "";
    for ($j = 0; $j < count((array)$input[$i]); $j++) {
        switch ($input[$i][$j]){
            case ')':
                if (substr($concatenatedWord, -1, 1) == "(") {
                    $concatenatedWord = substr_replace($concatenatedWord, '', - 1, 1);
                }
                else {
                    $points += 3;
                    $stopRunning = true;
                }
                break;
            case ']':
                if (substr($concatenatedWord, -1, 1) == "[") {
                    $concatenatedWord = substr_replace($concatenatedWord, '', - 1, 1);
                }
                else {
                    $points += 57;
                    $stopRunning = true;
                }
                break;
            case '}':
                if (substr($concatenatedWord, -1, 1) == "{") {
                    $concatenatedWord = substr_replace($concatenatedWord, '', - 1, 1);
                }
                else {
                    $points += 1197;
                    $stopRunning = true;
                }
                break;
            case '>':
                if (substr($concatenatedWord, -1, 1) == "<") {
                    $concatenatedWord = substr_replace($concatenatedWord, '', - 1, 1);
                }
                else {
                    $points += 25137;
                    $stopRunning = true;
                }
                break;
            default:
                $concatenatedWord .= $input[$i][$j];
                break;
        }
        if ($stopRunning) {
            break;
        }
    }
//    echo $points . '<br>';
//    echo $input[$i][$j] . '<br>';
//    echo $j . '<br>';
//    echo substr($concatenatedWord, -1, 1) . '<br>';
//    echo '<br>';
}
echo $points . '<br>';
