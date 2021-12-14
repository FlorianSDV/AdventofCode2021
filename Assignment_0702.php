<?php
function writeTable($array)
{

    echo '<pre>';
    print_r($array);
    echo '</pre>';

}
$horizontalArray = explode(',',file_get_contents('Assignment_0701_input'));
$grid = [];
for ($i = 0;$i <= 1921; $i ++){ // the largest number is 1921
    $grid[$i] = 0;
}

// populate array

foreach ($horizontalArray as $crab) {
    $grid[$crab]++;
}

sort($horizontalArray);

$fuelCosts = [];
for ($i = 0; $i < count($grid); $i++) {
    $fuelCost = 0;
    for ($j = 0; $j < count($grid); $j++) {
        $steps = abs($j - $i);
        $steps = ($steps * $steps + $steps) / 2; // nth triangle number formula
        $fuelCost += $steps * $grid[$j];
    }
    $fuelCosts[$i] = $fuelCost;
}
echo $steps . '<br>';
sort($fuelCosts);

echo $fuelCosts[0];