<?php
function tozero()
{ // change array values to 0
    return (0);
}

function writeTable($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

$routes = 0;
function walk($currentPos)
{
    global $nodes;
    global $routes;
    global $doubles;
    if (isset($doubles[$currentPos]) && $doubles[$currentPos] == 0) {
        $doubles[$currentPos] = 1;
        foreach ($nodes[$currentPos] as $step) {
            walk($step);
        }
    }
    else if($doubles[$currentPos]) && $doubles[$currentPos] == 1) {

    }
    else if ($nodes[$currentPos] == "end") {
        $routes++;
        $doubles = array_map('tozero', $doubles);
    } else {
        foreach ($nodes[$currentPos] as $step) {
            walk($step);
        }
    }
}

$doubles["b"] = 0;
$doubles["c"] = 0;
$doubles["d"] = 0;
//writeTable($doubles);
//$doubles = array_map('tozero', $doubles);
//writeTable($doubles);
$nodes["start"] = ["A", "b"];
$nodes["A"] = ["c", "b", "end"];
$nodes["b"] = ["A", "d", "end"];
$nodes["c"] = ["A"];
$nodes["d"] = ["b"];
$nodes["end"] = ("end");
writeTable($nodes);
if ($nodes["end"] == "end") {
    echo "end bitch!";
}
walk("start");

echo $routes;
//echo $nodes["end"];

