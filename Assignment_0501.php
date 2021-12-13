<?php
function writeTable($array) // method om arrays te weergeven
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

$grid = [];
$arrayKey = [];
for ($i = 0; $i < 1000; $i++) {
    for ($j = 0; $j < 1000; $j++) {
        $grid[$i][$j] = 0; // create 1000 x 1000 grid with zero's
    }
}
$importarray = explode(PHP_EOL, file_get_contents('Assignment_0501_input')); // import
for ($i = 0; $i < count($importarray); $i++) {
    $importarray[$i] = str_replace(' -> ', ',', $importarray[$i]);
    $importarray[$i] = explode(',', $importarray[$i]);
    if ($importarray[$i][0] == $importarray[$i][2] || $importarray[$i][1] == $importarray[$i][3]) {
        if ($importarray[$i][0] > $importarray[$i][2] || $importarray[$i][1] > $importarray[$i][3]) { // sort from high to low
            $tempx = $importarray[$i][0];
            $tempy = $importarray[$i][1];
            $importarray[$i][0] = $importarray[$i][2];
            $importarray[$i][1] = $importarray[$i][3];
            $importarray[$i][2] = $tempx;
            $importarray[$i][3] = $tempy;
        }
    } else {
        $arrayKey[count($arrayKey)] = $i; // get diagonal keys
    }
}
foreach ($arrayKey as $key) {
    unset($importarray[$key]); // remove diagonals
}
$importarray = array_values($importarray); // reindex array


//for ($i = 0; $i < count($importarray); $i++){
//
//}
foreach ($importarray as $line){
    if ($line[0] != $line[2]){ // horizontal
        for ($i = $line[0]; $i <= $line[2]; $i++) {
            $grid[$i][$line[1]]++;
        }
    }
    else { // line[1] != $line[3], vertical
        for ($i = $line[1]; $i <= $line[3]; $i++) {
            $grid[$line[0]][$i]++;
        }
    }
}
$counter = 0;
foreach ($grid as  $line) {
    foreach ($line as $tile) {
        if ($tile > 1){
            $counter++;
        }
    }
}
echo $counter . '<br>';
//writeTable($grid);