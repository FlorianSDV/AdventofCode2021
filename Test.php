<?php
function writeTable($array) // method om arrays te weergeven
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

$tellertje = 0;

function search($x, $y)
{
    global $array;
    global $tellertje;

    $tellertje++;

    echo "tellertje = " . $tellertje . '<br>';
    echo $array[$y][$x]. '<br>';

    $up = $array[(int)$y - 1][(int)$x];
    $right = $array[(int)$y][(int)$x + 1];
    $down = $array[(int)$y + 1][(int)$x];
    $left = $array[(int)$y][(int)$x - 1];

    $array[(int)$y][(int)$x] = "x";

    // check boven
    if ($up != "x") {
//        (int)$y = (int)$y - 1;
        search((int)$x, (int)$y - 1);
    }
    // check rechts
    if ($right != "x") {
//        $x = (int)$x + 1;
        search((int)$x + 1, (int)$y);
    }
    // check onder
    if ($down != "x") {
//        $y = (int)$y + 1;
        search((int)$x, (int)$y + 1);
    }
    // check links
    if ($left != "x") {
//        $x = (int)$x - 1;
        search((int)$x - 1, (int)$y);
    }
}

$array = explode(PHP_EOL, (file_get_contents("testinput.txt")));

for ($i = 0; $i < count($array); $i++) {
    $array[$i] = str_split($array[$i], 1);
}

for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array[$i]); $j++) {
        if ($array[$i][$j] == 9) {
            $array[$i][$j] = "x";
        }
    }
}

//search(1,1);
for ($y = 0; $y < count($array); $y++) {
    for ($x = 0; $x < count((array)$array[$y]); $x++) {
        if ($array[$y][$x] != "x") {
            //voer functie uit
            search($x, $y);
//            echo $x . '<br>';
        }
    }
}

//writeTable($array);
//echo $tellertje;