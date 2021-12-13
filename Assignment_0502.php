<?php
$grid = [];
$arrayKeyDiagonal = [];
$arrayKeyHorizVert = [];
for ($i = 0; $i < 1000; $i++) {
    for ($j = 0; $j < 1000; $j++) {
        $grid[$i][$j] = 0; // create 1000 x 1000 grid with zero's
    }
}
$importarray = explode(PHP_EOL, file_get_contents('Assignment_0501_input')); // import
for ($i = 0; $i < count($importarray); $i++) {
    $importarray[$i] = str_replace(' -> ', ',', $importarray[$i]);
    $importarray[$i] = explode(',', $importarray[$i]);
    if ($importarray[$i][0] == $importarray[$i][2] || $importarray[$i][1] == $importarray[$i][3]) { // horizontal and vertical
        if ($importarray[$i][0] > $importarray[$i][2] || $importarray[$i][1] > $importarray[$i][3]) { // sort from high to low
            $tempx = $importarray[$i][0];
            $tempy = $importarray[$i][1];
            $importarray[$i][0] = $importarray[$i][2];
            $importarray[$i][1] = $importarray[$i][3];
            $importarray[$i][2] = $tempx;
            $importarray[$i][3] = $tempy;
        }
        $arrayKeyHorizVert[count($arrayKeyHorizVert)] = $i; // get horizontal and vertical keys
    }
     else { // diagonal
        if ($importarray[$i][0] > $importarray[$i][2]) {
            $tempx = $importarray[$i][0];
            $tempy = $importarray[$i][1];
            $importarray[$i][0] = $importarray[$i][2];
            $importarray[$i][1] = $importarray[$i][3];
            $importarray[$i][2] = $tempx;
            $importarray[$i][3] = $tempy;
        }
        $arrayKeyDiagonal[count($arrayKeyDiagonal)] = $i; // get diagonal keys
    }
}
$horizVertArray = $importarray;
$diagonalArray = $importarray;

foreach ($arrayKeyDiagonal as $key) {
    unset($horizVertArray[$key]); // remove diagonals
}
$horizVertArray = array_values($horizVertArray); // reindex array

foreach ($arrayKeyHorizVert as $key) {
    unset($diagonalArray[$key]); // remove horizontal and vertical
}
$diagonalArray = array_values($diagonalArray); // reindex array

foreach ($horizVertArray as $line) { // place all horizontal and vertical lines
    if ($line[0] != $line[2]) { // horizontal
        for ($i = $line[0]; $i <= $line[2]; $i++) {
            $grid[$line[1]][$i]++;
        }
    } else { // line[1] != $line[3], vertical
        for ($i = $line[1]; $i <= $line[3]; $i++) {
            $grid[$i][$line[0]]++;
        }
    }
}

foreach ($diagonalArray as $line) {
    $yCounter = 0;
    $y = 0;
    if ($line[1] < $line[3]) { // if line goes from top left to bottom right
        for ($i = $line[0]; $i <= $line[2]; $i++) { // here we get our x coordinate
            $y = $line[1] + $yCounter;
            $grid[$y][$i]++;
            $yCounter++;
        }
    }
    else { // if line goes from bottom left to top right
        for ($i = $line[0]; $i <= $line[2]; $i++) { // here we get our x coordinate
            $y = $line[1] - $yCounter;
            $grid[$y][$i]++;
            $yCounter++;
        }
    }
}

$counter = 0;
foreach ($grid as $line) {
    foreach ($line as $tile) {
        if ($tile > 1) {
            $counter++;
        }
    }
}
echo $counter . '<br>';