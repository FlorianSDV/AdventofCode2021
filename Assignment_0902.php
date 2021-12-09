<?php
// om het mezelf makkelijker te maken heb ik de input aangepast. de input is nu omrand met x'en.
function writeTable($array) // method om arrays te weergeven
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

$tellertje = 0; // bijhouden hoeveel punten we scoren in de huidige 'pool'
$puntenArray = []; // array die alle punten bijhoud
function search($x, $y) // recursieve functie die alle punten in een pool telt.
{
    global $array; // global zodat we deze waarden vanuit de functie kunnen aanpassen
    global $tellertje;
    if ($array[(int)$y][(int)$x] != "x") { // extra maatregel omdat soms getallen 2 keer werden gescoord

        $tellertje++;
        $array[(int)$y][(int)$x] = "x"; // huidige plek naar 'x' veranderen zodat we weten dat we er geweest zijn
        $up = $array[(int)$y - 1][(int)$x];
        $right = $array[(int)$y][(int)$x + 1];
        $down = $array[(int)$y + 1][(int)$x];
        $left = $array[(int)$y][(int)$x - 1];

        // check boven
        if ($up != "x") {
            search((int)$x, (int)$y - 1);
        }
        // check rechts
        if ($right != "x") {
            search((int)$x + 1, (int)$y);
        }
        // check onder
        if ($down != "x") {
            search((int)$x, (int)$y + 1);
        }
        // check links
        if ($left != "x") {
            search((int)$x - 1, (int)$y);
        }
    }
}

$array = explode(PHP_EOL, (file_get_contents("Assignment_0902_input")));

for ($i = 0; $i < count($array); $i++) { //  zet alles in een array
    $array[$i] = str_split($array[$i], 1);
}

for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array[$i]); $j++) {
        if ($array[$i][$j] == 9) {
            $array[$i][$j] = "x"; // verander de negens naar: 'x'
        }
    }
}

for ($y = 0; $y < count($array); $y++) { // loop die van pool naar pool loopt
    for ($x = 0; $x < count((array)$array[$y]); $x++) {
        if ($array[$y][$x] != "x") {
            search($x, $y);
            $puntenArray[count($puntenArray)] = $tellertje;
            $tellertje = 0; // puntentelling wordt op 0 gezet voor de volgende pool
        }
    }
}
rsort($puntenArray); // sorteer de array descending
echo $puntenArray [0] * $puntenArray [1] * $puntenArray [2]; // product van de drie hoogsten als antwoord