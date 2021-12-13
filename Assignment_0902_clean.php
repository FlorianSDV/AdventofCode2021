<?php
// om het mezelf makkelijker te maken heb ik de input aangepast. de input is nu omrand met x'en.
$tellertje = 0; // bijhouden hoeveel punten we scoren in de huidige 'pool'
$puntenArray = []; // array die alle punten bijhoud
function search($x, $y) // recursieve functie die alle punten in een pool telt.
{
    global $array; // global zodat we deze waarden vanuit de functie kunnen aanpassen
    global $tellertje;
    if ($array[(int)$y][(int)$x] != "x") { // check of dit vakje een x is. als het een x is, stopt de functie.
        $tellertje++;
        $array[(int)$y][(int)$x] = "x"; // huidige plek naar 'x' veranderen zodat we weten dat we er geweest zijn
        search((int)$x, (int)$y - 1); // check boven
        search((int)$x + 1, (int)$y); // check rechts
        search((int)$x, (int)$y + 1); // check onder
        search((int)$x - 1, (int)$y); // check links
    }
}
$array = explode(PHP_EOL, (file_get_contents("Assignment_0902_input")));
for ($i = 0; $i < count($array); $i++) { //  zet alles in een array
    $array[$i] = str_split($array[$i], 1);
    for ($j = 0; $j < count($array[$i]); $j++) {
        if ($array[$i][$j] == 9) {
            $array[$i][$j] = "x"; // verander elke 9 naar: 'x'
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