<?php
function writeTable($array)
{

    echo '<pre>';
    print_r($array);
    echo '</pre>';

}

function intersect($one, $two)
{
    return count(array_intersect(str_split($one), str_split($two)));
}
$outputDisplay = explode(PHP_EOL, file_get_contents("Assignment_0801_input"));
for ($i = 0; $i < count($outputDisplay); $i++) {
    $outputDisplay[$i] = explode(" ", $outputDisplay[$i]);
}
//writeTable($outputDisplay);

$allNumbers = explode(PHP_EOL, file_get_contents('Assignment_0802_input'));
for ($i = 0; $i < count($allNumbers); $i++) {
    $allNumbers[$i] = explode(" ", $allNumbers[$i]);
}
//writeTable($allNumbers);

//$array1 = array("a" => "green", "red", "blue");
//$array2 = array("b" => "green", "yellow", "red");
//$result = array_intersect($array1, $array2);
//print_r($result);
//print_r(count($result));

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
    for ($i = 0; $i < count($twoThreeFive); $i++){
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
//    writeTable($twoThreeFive) . '<br>';
//    writeTable($sixNineZero) . '<br>';

    // op zoek naar 2 en 5

    $intersectTwoAndFive = intersect($twoThreeFive[0], $four);
    switch ($intersectTwoAndFive){
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
    switch ($intersectNineAndZero){
        case '3':
            $zero = $sixNineZero[0];
            $nine = $sixNineZero [1];
            break;
        case '4':
            $zero = $sixNineZero[1];
            $nine = $sixNineZero[0];
            break;
    }

//    $keepRunning = true;
//    for ($i = 0; $i < count($twoThreeFive); $i++) {
//        if ($keepRunning) {
//            $maybeThree = intersect($twoThreeFive[$i], $one);
//            switch ($maybeThree) {
//                case '2':
//                    $three = $twoThreeFive[$i];
//                    unset($twoThreeFive[$i]);
//                    $keepRunning = false;
//                    break;
//                default;
//                    break;
//            }
//        }
//    }
}

echo $one . '<br>';
echo $seven . '<br>';
echo $four . '<br>';
echo $eight . '<br>';
echo $six . '<br>';
echo $three . '<br>';
echo $two . '<br>';
echo $five . '<br>';
echo $zero . '<br>';
echo $nine . '<br>';