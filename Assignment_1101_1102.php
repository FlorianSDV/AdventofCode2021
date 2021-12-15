<?php
function flash($y, $x) // recursive function that lights octopuses
{
    global $grid; // global so we can change these values
    global $flashes;
    global $roundFlash;
    if (isset($grid[(int)$y][(int)$x])) { // checks if coördinates exist within the range ofthis index
        if ($grid[(int)$y][(int)$x] != "on a break") { // raises "power level" of octopus if it hasn't flashed this turn.
            $grid[(int)$y][(int)$x]++;
        }
        if ($grid[(int)$y][(int)$x] >= 10 && $grid[(int)$y][(int)$x] != "on a break") { // checks if octopus can flash
            $flashes++; // keep track of flashes performed
            $roundFlash++;
            $grid[(int)$y][(int)$x] = "on a break"; // if octopus flashes it's on a break
            flash((int)$y - 1, (int)$x); // check top
            flash((int)$y - 1, (int)$x + 1); // check topright
            flash((int)$y, (int)$x + 1); // check right
            flash((int)$y + 1, (int)$x + 1); // check downright
            flash((int)$y + 1, (int)$x); // check down
            flash((int)$y + 1, (int)$x - 1); // check downleft
            flash((int)$y, (int)$x - 1); // check left
            flash((int)$y - 1, (int)$x - 1); // check topleft
        }
    }
}
$flashes = 0; // total flashes
$roundFlash = 0; // flashes of current round
$grid = explode(PHP_EOL, file_get_contents('Assignment_1101_input'));
for ($i = 0; $i < count($grid); $i++) {
    $grid[$i] = str_split($grid[$i]);
}
for ($steps = 1; $steps <= 1000; $steps++) { // number of steps we take
    $roundFlash = 0;
    for ($i = 0; $i < count($grid); $i++) { // plus all octopuses
        for ($j = 0; $j < count((array)$grid[0]); $j++) {
            if ($grid[$i][$j] == "on a break") { // octopuses that have flashed last round are changed to 0 so they can flash again this round.
                $grid[$i][$j] = 0;
            }
                $grid[$i][$j]++; // charge power for this round
        }
    }
    for ($g = 0; $g < count($grid); $g++) { // check value of all octopuses
        for ($h = 0; $h < count((array)$grid[0]); $h++) {
            if ($grid[$g][$h] == 10) {
                flash($g, $h);
            }
        }
    }
    if ($roundFlash == count($grid) * count($grid[0])){
        echo $steps; // answer for part 2
        break;
    }
}
//echo $flashes; // answer for part 1