<?php
$explodedTextFile = explode(PHP_EOL, file_get_contents('Assignment_0301_input'));
for ($i = 0; $i < strlen($explodedTextFile[0]); $i++) {
    $gammaCounter = 0;
    $arrayKey = [];
    foreach ($explodedTextFile as $binNumber) {
        if (substr($binNumber, $i, 1) == 1) {
            $gammaCounter += 1;
        } else {
            $gammaCounter -= 1;
        }
    }
    if ($gammaCounter >= 0) {
        for ($j = 0; $j < count($explodedTextFile); $j++) {
            if (substr($explodedTextFile[$j], $i, 1) == 0) {
                // code die $explodedTextFile[$j] key opslaat
                $arrayKey[count($arrayKey)] = $j;
            }
        }
    } else {
        for ($j = 0; $j < count($explodedTextFile); $j++) {
            if (substr($explodedTextFile[$j], $i, 1) == 1) {
                // code die $explodedTextFile[$j] key opslaat
                $arrayKey[count($arrayKey)] = $j;
            }
        }
    }

    foreach ($arrayKey as $key){
        unset($explodedTextFile[$key]);
    }
    // code die array opnieuw indexeerd
    $explodedTextFile = array_values($explodedTextFile);

    if (count($explodedTextFile) <= 1) {
        break;
    }
}

echo "eerste waarde = " . $explodedTextFile[0] . '<br>';
$firstValue = $explodedTextFile[0];

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

$explodedTextFile = explode(PHP_EOL, file_get_contents('Assignment_0301_input'));
for ($i = 0; $i < strlen($explodedTextFile[0]); $i++) {
    $gammaCounter = 0;
    $arrayKey = [];
    foreach ($explodedTextFile as $binNumber) {
        if (substr($binNumber, $i, 1) == 1) {
            $gammaCounter += 1;
        } else {
            $gammaCounter -= 1;
        }
    }
    if ($gammaCounter >= 0) {
        for ($j = 0; $j < count($explodedTextFile); $j++) {
            if (substr($explodedTextFile[$j], $i, 1) == 1) {
                // code die $explodedTextFile[$j] key opslaat
                $arrayKey[count($arrayKey)] = $j;
            }
        }
    } else {
        for ($j = 0; $j < count($explodedTextFile); $j++) {
            if (substr($explodedTextFile[$j], $i, 1) == 0) {
                // code die $explodedTextFile[$j] key opslaat
                $arrayKey[count($arrayKey)] = $j;
            }
        }
    }

    foreach ($arrayKey as $key){
        unset($explodedTextFile[$key]);
    }
    // code die array opnieuw indexeerd
    $explodedTextFile = array_values($explodedTextFile);
    if (count($explodedTextFile) <= 1) {
        break;
    }
}
$secondValue = $explodedTextFile[0];
echo "tweede waarde = " . $secondValue . '<br>';
echo bindec($secondValue) * bindec($firstValue);