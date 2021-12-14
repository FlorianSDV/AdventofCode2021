<?php
function writeTable($array)
{

    echo '<pre>';
    print_r($array);
    echo '</pre>';

}
$horizontalArray = explode(',',file_get_contents('Assignment_0701_input'));

//writeTable($horizontalArray);

$grid = [0,0,0,0,0,0];
//$grid = [];
unset($grid[0]);

//writeTable($grid);

//for ($i = 0;$i < 17; $i ++){
//    $grid[$i] = 0;
//}

// populate array

foreach ($horizontalArray as $crab) {
    $grid[$crab]++;
}

writeTable($grid);
sort($horizontalArray);
writeTable($horizontalArray);

$fuelCosts = [];
for ($i = 1; $i <= count($grid); $i++) {
    $fuelCost = 0;
    for ($j = 1; $j <= count($grid); $j++) {
        $steps = abs($j - $i);
        $fuelCost += $steps * $grid[$j];
    }
    $fuelCosts[$i] = $fuelCost;
}
//$steps = abs(5 - 1);
//echo $steps * $grid[5];
//$fuelCost += $steps * $grid[5];
////echo $fuelCost;

//sort($fuelCosts);

writeTable($fuelCosts);

echo $fuelCosts[1];