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
//writeTable($cavernArray);
$width = count((array)$cavernArray[0]);
$height = count($cavernArray);
for ($v = 0; $v < $height; $v++) {
    for ($h = 0; $width; $h++) {
        $j++;
    }
}

echo $j;






//switch ($v) { // op de eerste en laatste regel moeten we het anders doen
//    case '0':
////                switch ($h) {
////                    case '0':
////                        echo "linksboven" . '<br>';
////                        break;
////                    case $width - 1:
////                        echo "rechtsboven" . '<br>';
////                        break;
////                    default:
////                        break;
////                }
//        break;
//    case '4':
////                switch ($h) {
////                    case '0':
////                        echo "linksonder" . '<br>';
////                        break;
////                    case $width - 1:
////                        echo "rechtsonder" . '<br>';
////                        break;
////                    default:
////                        break;
////                }
//        break;
//    default:
//
//        break;
//}