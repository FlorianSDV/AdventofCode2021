<?php
$explodedTextFile = explode(PHP_EOL, file_get_contents('Assignment_0301_input'));
$oxygenArray = $explodedTextFile;
$co2Array = $explodedTextFile;
$i = 0;

// oxygen
while (count($oxygenArray) != 1) {
    $gammaCounter = 0;
    foreach ($oxygenArray as $binNumber) {
        $cutoffpoint = strlen($oxygenArray[0]) - 1 - $i;
        if (substr($binNumber, $i, -$cutoffpoint) == 1) {
            $gammaCounter += 1;
        } else {
            $gammaCounter -= 1;
        }
    }
    $g = 0;
    $arrayKeys[0] = 0;

    if ($gammaCounter >= 0) {
        foreach ($oxygenArray as $binNumber) {
            $cutoffpoint = strlen($oxygenArray[0]) - 1 - $i;
            if (substr($binNumber, $i, -$cutoffpoint) == 1) {
                continue;
            } else {
                $arrayKeys[count($arrayKeys) - 1] = $g;
            }
            $g++;
        }
    } else {
        foreach ($oxygenArray as $binNumber) {
            $cutoffpoint = strlen($oxygenArray[0]) - 1 - $i;
            if (substr($binNumber, $i, -$cutoffpoint) == 0) {
                continue;
            } else {
                $arrayKeys[count($arrayKeys) - 1] = $g;
            }
            $g++;
        }
    }

    foreach ($arrayKeys as $key) {
        unset($oxygenArray[$key]);
    }
    $oxygenArray = array_values($oxygenArray);
    $i++;
}
//echo $oxygenArray[0];

//CO2
while (count($co2Array) != 1) {
    $gammaCounter = 0;
    foreach ($co2Array as $binNumber) {
        $cutoffpoint = strlen($co2Array[0]) - 1 - $i;
        if (substr($binNumber, $i, -$cutoffpoint) == 1) {
            $gammaCounter += 1;
        } else {
            $gammaCounter -= 1;
        }
    }
    $g = 0;
    $arrayKeys[0] = 0;

    if ($gammaCounter > 0) {
        foreach ($co2Array as $binNumber) {
            $cutoffpoint = strlen($co2Array[0]) - 1 - $i;
            if (substr($binNumber, $i, -$cutoffpoint) == 0) {
                continue;
            } else {
                $arrayKeys[count($arrayKeys) - 1] = $g;
            }
            $g++;
        }
    } else {
        foreach ($co2Array as $binNumber) {
            $cutoffpoint = strlen($co2Array[0]) - 1 - $i;
            if (substr($binNumber, $i, -$cutoffpoint) == 1) {
                continue;
            } else {
                $arrayKeys[count($arrayKeys) - 1] = $g;
            }
            $g++;
        }
    }

    foreach ($arrayKeys as $key) {
        unset($co2Array[$key]);
    }
    $co2Array = array_values($co2Array);
    $i++;
}
echo $oxygenArray[0] . '<br>';
echo $co2Array[0] . '<br>';
echo bindec($oxygenArray[0]) * bindec($co2Array[0]);