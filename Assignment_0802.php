<?php
function writeTable($array) // method om arrays te weergeven
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function intersect($one, $two) // method om te vergelijken hoeveel karakters in twee strings overlappen.
{
    return count(array_intersect(str_split($one), str_split($two)));
}

$outputDisplay = explode(PHP_EOL, file_get_contents("Assignment_0801_input"));
for ($i = 0; $i < count($outputDisplay); $i++) {
    $outputDisplay[$i] = explode(" ", $outputDisplay[$i]);
}
$allNumbers = explode(PHP_EOL, file_get_contents('Assignment_0802_input'));
for ($i = 0; $i < count($allNumbers); $i++) {
    $allNumbers[$i] = explode(" ", $allNumbers[$i]);
}

$sumDisplays = null;
$vertical = 0;
$twoThreeFive = [];
$sixNineZero = []; // nice.
foreach ($allNumbers as $line) { // ga door elke regel
    $twoThreeFive = [];
    $sixNineZero = [];
    foreach ((array)$line as $word) { // ga langs elk woord in de regel
        $wordLength = strlen($word);
        switch ($wordLength) {
            case '2':
                $one = $word;
                break;
            case '3':
                $seven = $word;
                break;
            case '4':
                $four = $word;
                break;
            case '7':
                $eight = $word;
                break;
            case '5':
                $twoThreeFive[count($twoThreeFive)] = $word;
                break;
            case '6':
                $sixNineZero[count($sixNineZero)] = $word;
                break;
        }
    }
//    writeTable($sixNineZero) . '<br>';

    // nadat we door elk woord zijn geweest moeten we 2, 3, 5, 6 en 9 uitzoeken.
    // eerst gaan we wat getallen met de 1 vergelijken
    for ($i = 0; $i < count($sixNineZero); $i++) {
        $sixNineOverlap = intersect($sixNineZero[$i], $one);
        switch ($sixNineOverlap) {
            case '1':
                $six = $sixNineZero[$i];
                unset($sixNineZero[$i]);
                $sixNineZero = array_values($sixNineZero);
                break;
            default:
                break;
        }

    }
    for ($i = 0; $i < count($twoThreeFive); $i++) {
        $twoThreeFiveOverlap = intersect($twoThreeFive[$i], $one);
        switch ($twoThreeFiveOverlap) {
            case '2':
                $three = $twoThreeFive[$i];
                unset($twoThreeFive[$i]);
                $twoThreeFive = array_values($twoThreeFive);
                break;
            default:
                break;
        }
    }

    // op zoek naar 2 en 5
    $intersectTwoAndFive = intersect($twoThreeFive[0], $four);
    switch ($intersectTwoAndFive) {
        case '2':
            $two = $twoThreeFive[0];
            $five = $twoThreeFive[1];
            break;
        case '3':
            $two = $twoThreeFive[1];
            $five = $twoThreeFive[0];
            break;
    }
    $intersectNineAndZero = intersect($sixNineZero[0], $four);
    switch ($intersectNineAndZero) {
        case '3':
            $zero = $sixNineZero[0];
            $nine = $sixNineZero [1];
            break;
        case '4':
            $zero = $sixNineZero[1];
            $nine = $sixNineZero[0];
            break;
    }
    $concatenatedNumber = null;
    for ($horizontal = 0; $horizontal < 4; $horizontal++) {
        switch (strlen($outputDisplay[$vertical][$horizontal])) {
            case '2': // 1
                $concatenatedNumber .= 1;
                break;
            case '3': // 7
                $concatenatedNumber .= 7;
                break;
            case '4': // 4
                $concatenatedNumber .= 4;
                break;
            case '7': // 8
                $concatenatedNumber .= 8;
                break;
            case '6':
                if (intersect($outputDisplay[$vertical][$horizontal], $six) == 6) {
                    $concatenatedNumber .= 6;
                }
                if (intersect($outputDisplay[$vertical][$horizontal], $nine) == 6) {
                    $concatenatedNumber .= 9;
                }
                if (intersect($outputDisplay[$vertical][$horizontal], $zero) == 6) {
                    $concatenatedNumber .= 0;
                }
                break;
            case '5':
                if (intersect($outputDisplay[$vertical][$horizontal], $two) == 5) {
                    $concatenatedNumber .= 2;
                }
                if (intersect($outputDisplay[$vertical][$horizontal], $three) == 5) {
                    $concatenatedNumber .= 3;
                }
                if (intersect($outputDisplay[$vertical][$horizontal], $five) == 5) {
                    $concatenatedNumber .= 5;
                }
                break;
            default:
                echo "het werkt niet." . '<br>';
                break;
        }
    }
    $sumDisplays += $concatenatedNumber;
    $vertical++;
}
echo $sumDisplays;