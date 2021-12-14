<?php
function writeTable($array)
{

    echo '<pre>';
    print_r($array);
    echo '</pre>';

}

$input = explode(PHP_EOL, file_get_contents('Assignment_1001_input'));

for ($i = 0; $i < count($input); $i++) {
    $input[$i] = str_split($input[$i]);
}
writeTable($input);
$points = 0;
$concatenatedWord = "";
for ($i = 0; $i < count($input); $i++) {
    $concatenatedWord = "";
    for ($j = 0; $j < count((array)$input[$i]); $j++) {
        switch ($input[$i][$j]){
            case ')':
                if (substr($input[$i][$j], -1) == '(') {
                    $concatenatedWord = substr_replace($concatenatedWord, '', - 1, 1);
                }
                else {
                    $points += 3;
                }
                break;
            case ']':
                if (substr($input[$i][$j], -1) == '[') {
                    $concatenatedWord = substr_replace($concatenatedWord, '', - 1, 1);
                }
                else {
                    $points += 57;
                }
                break;
            case '}':
                if (substr($input[$i][$j], -1) == '{') {
                    $concatenatedWord = substr_replace($concatenatedWord, '', - 1, 1);
                }
                else {
                    $points += 1197;
                }
                break;
            case '>':
                if (substr($input[$i][$j], -1) == '<') {
                    $concatenatedWord = substr_replace($concatenatedWord, '', - 1, 1);
                }
                else {
                    $points += 25137;
                }
                break;
            default:
                $concatenatedWord .= $input[$i][$j];
                break;
        }
    }
}
echo $points;
$b = 'bob';
//echo $b;

$b = substr_replace($b, '', -2, 2);
//echo $b;
