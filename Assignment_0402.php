<?php

function writeTable($array) // een functie die een array mooi weergeeft
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
$youmustBreak = false;
$product = null;
$countFirstimport = count($firstImport);
foreach ($drawnNumbers as $comparisonNumber) { // elk nummer dat uit de "zak" wordt getrokken gaan we vergelijken.
    for ($i = 0; $i < $countFirstimport; $i++) { // met deze loop gaan we elk bingo vel af.
        for ($g = 0; $g < 5; $g++) { // met deze loop gaan we elke rij in het bingo vel af.
            for ($j = 0; $j < 5; $j++) { // met deze loop gaan we elk getal in een rij af.
                if ($firstImport[$i][$g][$j] == $comparisonNumber) { // als het gekozen getal gelijk is aan het getrokken getal zetten we deze op leeg.
                    $firstImport[$i][$g][$j] = "";
                }
                // als alle getallen in een rij 0 zijn heb je bingo
                if (array_sum($firstImport[$i][$g]) == 0) {
                    $arrayKey = $i; // de array key geven we mee zodat we deze kunnen verwijderen.
                    $youmustBreak = true; // zodra we bingo hebben moeten we weg uit dit bingo vel.
                    $product = array_sum($firstImport[$i][0]) +
                        array_sum($firstImport[$i][1]) +
                        array_sum($firstImport[$i][2]) +
                        array_sum($firstImport[$i][3]) +
                        array_sum($firstImport[$i][4]);
                    $product = $product * $comparisonNumber; // de waarde waar we naar op zoek zijn.
                }
                // als alle getallen in een kolom 0 zijn heb je bingo
                if ($firstImport[$i][0][$j] == "" && $firstImport[$i][1][$j] == "" && $firstImport[$i][2][$j] == "" && $firstImport[$i][3][$j] == "" && $firstImport[$i][4][$j] == "") {
                    $arrayKey = $i; // de array key geven we mee zodat we deze kunnen verwijderen.
                    $youmustBreak = true; // zodra we bingo hebben moeten we weg uit dit bingo vel.
                    $product = array_sum($firstImport[$i][0]) +
                        array_sum($firstImport[$i][1]) +
                        array_sum($firstImport[$i][2]) +
                        array_sum($firstImport[$i][3]) +
                        array_sum($firstImport[$i][4]);
                    $product = $product * $comparisonNumber; // de waarde waar we naar op zoek zijn.
                }
            }
            if ($youmustBreak) { // als we bingo hebben moeten we uit deze loop breken. anders blijven we zoeken in een bingo vel dat niet meer bestaat.
                unset($firstImport[$arrayKey]);
                $youmustBreak = false;
                break;
            }
        }
    }
    $firstImport = array_values($firstImport); // de array moet opnieuw geïndexeerd worden omdat er "gaten" zijn.
    $countFirstimport = count($firstImport); // na indexatie is de grootte van de array verandert.
    if ($countFirstimport == 0) { // als we alle bingo vellen hebben gehad kunnen we stoppen.
        break;
    }
}
echo $product; // het antwoord