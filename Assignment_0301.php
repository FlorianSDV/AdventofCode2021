<?php
$explodedTextFile = explode(PHP_EOL, file_get_contents('Assignment_0301_input'));
$gamma = null;
$epsilon = null;
for ($i = 0; $i < strlen($explodedTextFile[0]); $i++) {
    $gammaCounter = 0;
    foreach ($explodedTextFile as $binNumber) {
        $cutoffpoint = strlen($explodedTextFile[0]) - 1 - $i;
        if (substr($binNumber, $i, - $cutoffpoint) == 1) {
            $gammaCounter += 1;
        } else {
            $gammaCounter -= 1;
        }
    }
    if ($gammaCounter > 0) {
        $gamma[$i] = 1;
        $epsilon[$i] = 0;
    } else {
        $gamma[$i] = 0;
        $epsilon[$i] = 1;
    }
}
$bin1 = null;
foreach ($gamma as $bin) {
    $bin1 .= $bin;
}
$bin2 = null;
foreach ($epsilon as $bin) {
    $bin2 .= $bin;
}
echo bindec($bin1) * bindec($bin2);