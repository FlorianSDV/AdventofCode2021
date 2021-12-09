<?php
function writeTable($array) // method om arrays te weergeven
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

$cavernArray = explode(PHP_EOL, file_get_contents('Assignment_0901_input'));
for ($i = 0; $i < count($cavernArray); $i++) {
    $cavernArray[$i] = str_split($cavernArray[$i]);
}

$riskLevel = 0;
$width = count((array)$cavernArray[0]);
$height = count($cavernArray);
echo $height - 1 . '<br>';
for ($vertical = 0; $vertical < $height; $vertical++) {
    for ($horizontal = 0; $horizontal < $width; $horizontal++) {
        switch ($vertical) { // op de eerste en laatste regel moeten we het anders doen
            case '0':
                switch ($horizontal) {
                    case '0':
//                         linksboven
                        if ($cavernArray[$vertical][$horizontal] < $cavernArray[$vertical + 1][$horizontal] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical][$horizontal + 1]) {
                            $riskLevel += (int)$cavernArray[$vertical][$horizontal] + 1;
                        }
                        break;
                    case $width - 1:
//                        rechtsboven"
                        if ($cavernArray[$vertical][$horizontal] < $cavernArray[$vertical + 1][$horizontal] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical][$horizontal - 1]) {
                            $riskLevel += (int)$cavernArray[$vertical][$horizontal] + 1;
                        }
                        break;
                    default:
//                        boven
                        if ($cavernArray[$vertical][$horizontal] < $cavernArray[$vertical][$horizontal - 1] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical + 1][$horizontal] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical][$horizontal + 1]) {
                            $riskLevel += (int)$cavernArray[$vertical][$horizontal] + 1;
                        }
                        break;
                }
                break;
            case $height - 1:
                switch ($horizontal) {
                    case '0':
//                        linksonder
                        if ($cavernArray[$vertical][$horizontal] < $cavernArray[$vertical - 1][$horizontal] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical][$horizontal + 1]) {
                            $riskLevel += (int)$cavernArray[$vertical][$horizontal] + 1;
                        }
                        break;
                    case $width - 1:
//                        rechtsonder
                        if ($cavernArray[$vertical][$horizontal] < $cavernArray[$vertical - 1][$horizontal] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical][$horizontal - 1]) {
                            $riskLevel += (int)$cavernArray[$vertical][$horizontal] + 1;
                        }
                        break;
                    default:
//                        onder
                        if ($cavernArray[$vertical][$horizontal] < $cavernArray[$vertical][$horizontal - 1] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical - 1][$horizontal] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical][$horizontal + 1]) {
                            $riskLevel += (int)$cavernArray[$vertical][$horizontal] + 1;
                        }
                        break;
                }
                break;
            default:
                switch ($horizontal) {
                    case '0':
//                        links
                        if ($cavernArray[$vertical][$horizontal] < $cavernArray[$vertical - 1][$horizontal] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical + 1][$horizontal] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical][$horizontal + 1]) {
                            $riskLevel += (int)$cavernArray[$vertical][$horizontal] + 1;
                        }
                        break;
                    case $width - 1:
//                        rechts
                        echo $vertical . '<br>';
                        echo $horizontal . '<br>';
                        if ($cavernArray[$vertical][$horizontal] < $cavernArray[$vertical - 1][$horizontal] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical + 1][$horizontal] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical][$horizontal - 1]) {
                            $riskLevel += (int)$cavernArray[$vertical][$horizontal] + 1;
                        }
                        break;
                    default:
//                        midden
                        if ($cavernArray[$vertical][$horizontal] < $cavernArray[$vertical][$horizontal - 1] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical + 1][$horizontal] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical - 1][$horizontal] && $cavernArray[$vertical][$horizontal] < $cavernArray[$vertical][$horizontal + 1]) {
                            $riskLevel += (int)$cavernArray[$vertical][$horizontal] + 1;
                        }
                        break;
                }
                break;
        }
    }
}
echo $riskLevel;