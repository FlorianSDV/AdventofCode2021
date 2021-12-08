<?php
function writeTable($array)
{

    echo '<pre>';
    print_r($array);
    echo '</pre>';

}

$firstImport = explode(PHP_EOL . PHP_EOL, file_get_contents("Assignment_04_Bingo_Sheet"));
$drawnNumbers = explode(',', file_get_contents("Assignment_0401_input"));
for ($i = 0; $i < count($firstImport); $i++) {
    $firstImport[$i] = explode(PHP_EOL, $firstImport[$i]);
    for ($g = 0; $g < count($firstImport[$i]); $g++) {
        $firstImport[$i][$g] = explode(" ", $firstImport[$i][$g]);
        $firstImport[$i][$g] = array_diff((array)$firstImport[$i][$g], [""]); // getallen onder de 10 hebben een spatie en creëren daarom een nieuw element. hier wordt dit element verwijdert.
        $firstImport[$i][$g] = array_values((array)$firstImport[$i][$g]);// zorgt dat alles juist geïndexeerd is.

    }
}
//writeTable($firstImport);
$stopRunning = false;
foreach ($drawnNumbers as $comparisonNumber) {
    for ($i = 0; $i < count($firstImport); $i++) {
        for ($g = 0; $g < count((array)$firstImport[$i]); $g++) {
            for ($j = 0; $j < count($firstImport[$i][$g]); $j++) {
                if ($firstImport[$i][$g][$j] == $comparisonNumber) {
                    $firstImport[$i][$g][$j] = "";
                }
                if (array_sum($firstImport[$i][$g]) == 0) {
                    if (count($firstImport) > 1) {
                        ($firstImport[$i]; // geen unset maar waarde toekennen.  nieuwe if bedenken. misschien tellertje vergelijken met array count?
                    } else {
                    echo count($firstImport) . '<br>';

                        $product = array_sum($firstImport[$i][0]) +
                        array_sum($firstImport[$i][1]) +
                        array_sum($firstImport[$i][2]) +
                        array_sum($firstImport[$i][3]) +
                        array_sum($firstImport[$i][4]);
                    $product = $product * $comparisonNumber;
                    echo $product . '<br>';
                    $stopRunning = True;
                }
                }
                if ($firstImport[$i][0][$j] == "" && $firstImport[$i][1][$j] == "" && $firstImport[$i][2][$j] == "" && $firstImport[$i][3][$j] == "" && $firstImport[$i][4][$j] == "") {
                    if (count($firstImport) > 1) {
                        unset($firstImport[$i]);
                    } else {
                        echo count($firstImport) . '<br>';

                        $product = array_sum($firstImport[$i][0]) +
                            array_sum($firstImport[$i][1]) +
                            array_sum($firstImport[$i][2]) +
                            array_sum($firstImport[$i][3]) +
                            array_sum($firstImport[$i][4]);
                        $product = $product * $comparisonNumber;
                        echo $product . '<br>';
                        $stopRunning = True;
                    }
                }

                if ($stopRunning == true) {
                    break;
                }
            }
            if ($stopRunning == true) {
                break;
            }
        }
        if ($stopRunning == true) {
            break;
        }
    }
    if ($stopRunning == true) {
        break;
    }
}
