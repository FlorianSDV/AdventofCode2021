<?php
function writeTable($array)
{

    echo '<pre>';
    print_r($array);
    echo '</pre>';

}

$fishArray = [0, 0, 0, 0, 0, 0, 0, 0, 0];
$input = explode(',', file_get_contents('Assignment_0601_input'));
//writeTable($input);

foreach ($input as $fish) {
    $fishArray[$fish]++;
}

for ($i = 1; $i <= 256; $i++) {
    $temp6 = $fishArray[0] + $fishArray[7];
    $temp8 = $fishArray [0];
    $fishArray[0] = $fishArray[1];
    $fishArray[1] = $fishArray[2];
    $fishArray[2] = $fishArray[3];
    $fishArray[3] = $fishArray[4];
    $fishArray[4] = $fishArray[5];
    $fishArray[5] = $fishArray[6];
    $fishArray[6] = $temp6;
    $fishArray[7] = $fishArray[8];
    $fishArray[8] = $temp8;
}
writeTable($fishArray);
$number = 0;
foreach ($fishArray as $fishes) {
    $number += $fishes;
}
echo $number;